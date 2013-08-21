Pribi (forked from [Dibi](http://pribiphp.com) - smart database layer for PHP)
=========================================================

Database access functions in PHP are not standardised. This library
hides the differences between them, a above all, it gives you a very handy interface.

The best way how to install Dibi is to use a [Composer](http://getcomposer.org/download):

    php composer.phar require pribi/pribi

Or you can download a latest package from http://pribiphp.com. In this
package is also `Dibi.minified`, shrinked single-file version of whole Dibi,
useful when you don't want to modify library, but just use it.

Dibi requires PHP 5.2.0 or later. It has been tested with PHP 5.5 too.


Examples
--------

Refer to the `examples` directory for examples. Dibi documentation is
available on the [homepage](http://pribiphp.com).

Connect to database:

```php
// connect to database (static way)
pribi::connect(array(
    'driver'   => 'mysql',
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '***',
));

// or object way; in all other examples use $connection-> instead of pribi::
$connection = new DibiConnection($options);
```

SELECT, INSERT, UPDATE

```php
pribi::query('SELECT * FROM users WHERE id = ?', $id);

$arr = array(
    'name' => 'John',
    'is_admin'  => TRUE,
);
pribi::query('INSERT INTO users', $arr);
// INSERT INTO users (`name`, `is_admin`) VALUES ('John', 1)

pribi::query('UPDATE users SET', $arr, 'WHERE `id`=?', $x);
// UPDATE users SET `name`='John', `is_admin`=1 WHERE `id` = 123

pribi::query('UPDATE users SET', array(
	'title' => array('SHA1(?)', 'tajneheslo'),
));
// UPDATE users SET 'title' = SHA1('tajneheslo')
```

Getting results

```php
$result = pribi::query('SELECT * FROM users');

$value = $result->fetchSingle(); // single value
$all = $result->fetchAll(); // all rows
$assoc = $result->fetchAssoc('id'); // all rows as associative array
$pairs = $result->fetchPairs('customerID', 'name'); // all rows as key => value pairs

// iterating
foreach ($result as $n => $row) {
    print_r($row);
}
```

Modifiers for arrays:

```php
pribi::query('SELECT * FROM users WHERE %and', array(
	array('number > ?', 10),
	array('number < ?', 100),
));
// SELECT * FROM users WHERE (number > 10) AND (number < 100)
```

<table>
<tr><td> %and </td><td>  </td><td> `[key]=val AND [key2]="val2" AND ...` </td></tr>
<tr><td> %or </td><td>  </td><td> `[key]=val OR [key2]="val2" OR ...` </td></tr>
<tr><td> %a </td><td> assoc </td><td> `[key]=val, [key2]="val2", ...` </td></tr>
<tr><td> %l %in </td><td> list </td><td> `(val, "val2", ...)` </td></tr>
<tr><td> %v </td><td> values </td><td> `([key], [key2], ...) VALUES (val, "val2", ...)` </td></tr>
<tr><td> %m </td><td> multivalues </td><td> `([key], [key2], ...) VALUES (val, "val2", ...), (val, "val2", ...), ...` </td></tr>
<tr><td> %by </td><td> ordering </td><td> `[key] ASC, [key2] DESC ...` </td></tr>
<tr><td> %n </td><td> identifiers </td><td> `[key], [key2] AS alias, ...` </td></tr>
<tr><td> other  </td><td> - </td><td> `val, val2, ...` </td></tr>
</table>


Modifiers for LIKE

```php
pribi::query("SELECT * FROM table WHERE name LIKE %like~", $query);
```

<table>
<tr><td> %like~	</td><td> begins with </td></tr>
<tr><td> %~like	</td><td> ends with </td></tr>
<tr><td> %~like~ </td><td> contains </td></tr>
</table>

DateTime:

```php
pribi::query('UPDATE users SET', array(
    'time' => new DateTime,
));
// UPDATE users SET ('2008-01-01 01:08:10')
```

Testing:

```php
echo pribi::$sql; // last SQL query
echo pribi::$elapsedTime;
echo pribi::$numOfQueries;
echo pribi::$totalTime;
```


-----

[![Build Status](https://secure.travis-ci.org/dg/pribi.png?branch=master)](http://travis-ci.org/dg/pribi)
