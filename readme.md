[![Build Status](https://travis-ci.org/jaroslavtyc/pribi.svg?branch=master)](https://travis-ci.org/jaroslavtyc/pribi)

Pribi (forked from [Dibi](http://dibiphp.com/cs/) - smart database layer for PHP)
=========================================================

Original [Dibi](http://dibiphp.com/cs/) is great.

Not the unified interface for any database vendor, but the fluent interface.

And short notations of standard operations.

And for type-check of parameters, inserted similarly to printf() (just for integer the %i notation is used in difference).

And should be greater, but the price for universality does not allow it.
Especially lack of prepared statements hurts these developers, who recalculate CPU time to money.

Forbidden changes, because of final methods or whole classes, confound chance to extend Dibi itself, so fork has been enforced.
All hail the "Fluent, MySQL, prepared statements". And wish me good luck with development.

Pribi requires [PHP 5.5.0](http://php.net/releases/5_5_0.php) or later because of [namespaces 5.3](http://php.net/manual/en/language.namespaces.php),
[\_\_callStatic() 5.3](http://www.php.net/manual/en/language.oop5.overloading.php#object.callstatic),
[\_\_DIR\_\_ 5.3](http://php.net/manual/en/language.constants.predefined.php),
[traits 5.4](http://php.net/traits)
and [Foo::class magic (auto-existing) absolute class name constant](http://cz1.php.net/oop5.basic#language.oop5.basic.class.class).

Tips and Tricks
---------------
**Identifier quote**
- Pribi is for MySQL. That's the trick. That means, the quotation is done by \` (tick).
	Not SQL-99 standard by " (double quote), not MS SQL style by \[ \] (brackets) or anything else. Only \`ticks\`.

**Protection against empty array of values to search by**
- Empty `IN()` condition will cause syntax error in MySQL, Pribi will replace it for you by IN(NULL), which results always to FALSE.

**Aliasing**
- For alias, use <code>select('table_with_some_domain_name.columnWithNameReferencingToTableDomain')->as('prettyAliasWithBothTableAndColumnMeaning')</code>.
	If you want try to use shorthand as <code>select('columnName prettyAlias')</code>, that means two strings split by white space, you will have to wrap both identifiers like this <code>select('\`columnName\` \`prettyAlias\`')</code>
	Otherwise Pribi will wrap your string as single identifier: <code>'columnName prettyAlias'</code> = <code>\`columnName prettyAlias\`</code> (yes, name with space is valid).
	So again, use fluent. Every time. That's what Pribi has been designed for and what is native then.

Attractions
-----------
* <code>SELECT 1</code> is complete and valid query, it will return, surprisingly, `1`.
* <code>SELECT * FROM \`tableFoo\` INNER JOIN \`tableBar\`</code> is valid too, but without `ON` (or `WHERE`) condition, specifying bindings between `tableFoo` and `tableBar`, nothing will be as result. MySQL allows to run query like this (with empty result), but Pribi does not offer you (by fluent) execution of that query immediately after `INNER JOIN` because of useless result.
* <code>SELECT IF(1, 'Hit!', 'Missed!') AS integerAsBoolean</code> will give string *Hit!*, <code>SELECT IF('1', 'Hit!', 'Missed!') AS stringIntegerAsBoolean</code> will give string *Hit!*, <code>SELECT IF('true', 'Hit!', 'Missed!') AS stringAsBoolean</code> will give string *Miss!*. How is this possible? Maybe because u think in PHP or similar language. MySQL tries cast everything in condition to boolean. Integer or float is not a problem, string with integer of float value is again not a problem, but everything else, as any text, is converted to *false*. Finally, <code>SELECT IF('0.1false', 'Hit!', 'Missed!') AS stringStartingByIntegerAsBoolean</code> will give string *Hit!*, because MySQL reads it from left to right and casting the value to number, so at the end MySQL uses float 0.1 as condition value and that is considered as *true*.
* <code>SELECT * FROM \`foo\` LEFT JOIN \`bar\`</code> on the other hand is not valid for MySQL and you will get a syntax error. And again, Pribi does not offer you (by fluent) the execution of that query.
* <code>SELECT * FROM \`foo\` INNER JOIN \`bar\` ON TRUE</code> seems almost same like previous situation, but notice the trailing `ON TRUE` condition. It says *join everything with everything* and will give you every combination of all rows of both tables, which will result into `number of rows of first table` multiply `number of rows of second table` of result rows.
* <code>SELECT * FROM \`foo\` LEFT JOIN \`bar\` ON TRUE</code> seems again almost same like previous situation, which will give you again combinations of every row of every table, but notice the `LEFT` keyword, which covers situation when the second table is empty - then at least rows from the first table will be in result (extended by columns of the second table, but with NULL values everywhere, as any LEFT JOIN without condition match).
* This is valid identifier <code>\`9[;,-/\`</code>, and this too <code>\`SELECT (*_*) AS REALY?!\`</code>, if you do not forgot \`ticks\`. Like this you can name your columns, tables, databases, aliases (all called *identifier*). But seriously, do not do it, if you do not like pain badly.
* `NULL` is not a standard value, it does not mean *nothing* but much more something like *does not know*. If you want to search for `NULL` value, you will have to use `IS NULL` or `IS NOT NULL` construction. Comparing any value with `NULL` results into `NULL`, because MySQL really does not know, what `NULL` means against compared value. For example, `15 = NULL` is `NULL`, `"" = NULL` (empty string) is `NULL`, `TRUE = NULL` is `NULL` and finally `NULL = NULL` is again `NULL`. Because, remember this, MySQL does not know what is meaning of `NULL`, so comparing *unknown value* with *unknown value* has *unknown result*. For any details, try [MySQL official pages](http://dev.mysql.com/doc/refman/5.0/en/working-with-null.html).
* When we are talking about `NULL`, remember than `NULL` can occurs during calculation and then "NULL-out" whole result, as for example could do divination by zero (<code>SELECT (5 + 64 / 0 - 12) IS NULL</code> results into 1).
* <code>WHERE IN ()</code> is not a valid condition and causes a syntax error because of missing parameters of `IN` condition. Using <code>\`columnFoo\` IN (NULL)</code> *matches nothing*, even if some of \`columnFoo\` value is `NULL` (which is very special, respective very unknown, as mentioned before).
* <code>\`columnFoo\` LIKE \`columnBar\`</code> condition brings same results as <code>\`columnFoo\` = \`columnBar\`</code>, but is performed much slower because of lexical value comparison and also ignores keys. Try it in your sandbox and never after. I checked this for MyISAM and InnoDB engines.
* How to multiply values of a column? To sum numbers from one row, you can just simply sum them by plus sign <code>SELECT (\`firstColumn\` + \`secondColumn\` + \`anotherColumn\`) AS \`sumResult\`</code> and to multiply them by star sign <code>SELECT (\`firstColumn\` * \`secondColumn\` * \`anotherColumn\`) AS \`multiplicationResult\`</code>. To sum values from all rows, but single column, you can use built-in function <code>SELECT SUM(\`columnWithValuesToSum\`)</code>, but what if you need to *multiply* values from all rows, but single column? Now math come to help by logarithm <code>SELECT EXP(SUM(LOG(\`columnWithValuesToMultiply\`))) AS \`multiplied\`</code>.
* `IN` command becomes much faster than repeated `WHERE` for a large amount of values. For details try [Danil Zburivsky research](http://www.pythian.com/blog/debugging-in-vs-or-performance-in-mysql/) and then [Baron Schwartz simple answer](http://lists.mysql.com/mysql/216945) about sorted values in the `IN` list.
* *Duplicate key on update* when creating a table? Yes, that is quite confusing message. Its correct meaning is *The name of a key (index) you want to use is already in use for an existing table*.
* Queries too slow? [Use the index, Luke!](http://use-the-index-luke.com/). And use the `EXPLAIN` to find out if an index is used at all.
* To use or not to use `PRIMARY KEY` for InnoDB table? As say [Jeremy Cole](http://blog.jcole.us/2013/01/07/the-physical-structure-of-innodb-index-pages/) *Every table __has__ a primary key*, even if you do not want to (if the `PRIMARY KEY` is not explicitly specified, the first non-NULL unique key is used, and failing that, a 48-bit hidden *Row ID* field is automatically added), so create it by yourself to take control over it.
* What operation comes first to play? SQL operations order are as follows. Check the [Ben Nadel blog](http://www.bennadel.com/blog/70-sql-query-order-of-operations.htm) for details.
	1. FROM clause
	2. WHERE clause
	3. GROUP BY clause
	4. HAVING clause
	5. SELECT clause
	6. ORDER BY clause
