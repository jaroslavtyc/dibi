Pribi (forked from [Dibi](http://dibiphp.com) - smart database layer for PHP)
=========================================================

Original [Dibi](http://dibiphp.com) is great.

Not the unified interface for any database vendor, but the fluent interface.

And short notations of standard operations.

And for type-check of parameters, inserted similarly to printf() (just for integer the %i notation is used in difference).

And should be greater, but price for universality does not allow it.
Especially lack of prepared statements hurts these developers, who are recalculating CPU time to money.

Forbidden changes, because of final methods or whole classes, confound chance to extend Dibi itself, so fork has been enforced.
All hail the "Fluent, MySQL, prepared statements". And wish me good luck with development.

Pribi requires [PHP 5.4.0](http://php.net/releases/5_4_0.php)
or later because of [namespaces 5.3](http://php.net/manual/en/language.namespaces.php)
 ,[__callStatic() 5.3](http://www.php.net/manual/en/language.oop5.overloading.php#object.callstatic)
 ,[__DIR__ 5.3](http://php.net/manual/en/language.constants.predefined.php)
 and [traits 5.4](http://php.net/traits).

Tips and Tricks
---------------
**Identifier quote**

- Pribi is for MySQL. That's the trick. That means, the quotation is done by \` (tick).
	Not SQL-99 standard by " (double quote), not MS SQL standard by \[ \] (brackets) or anything else. Only \`ticks\`.
- Empty `IN()` condition will cause syntax error in MySQL, Pribi will replace it or you by IN(NULL).

**Aliasing**

- Use fluent interface. Every time its possible. And that should be every time. For alias, use <code>select('columnName')->as('prettyAlias')</code>.
	If you want try to use shorthand as <code>select('columnName prettyAlias')</code>, that means two strings split by white space, you will have to wrap both identifiers like this <code>select('\`columnName\` \`prettyAlias\`')</code>
	Otherwise Pribi will wrap your string as single identifier: <code>'columnName prettyAlias'</code> = <code>\`columnName prettyAlias\`</code>, yes, this is valid name.
	So again, use fluent. Every time. That's what Pribi has been designed for and what is native then.

Attractions
-----------
* <code>SELECT 1</code> is complete and valid query, it will return, surprisingly, `1`.
* <code>SELECT * FROM \`tableFoo\` INNER JOIN \`tableBar\`</code> is valid too, but without `ON` (or `WHERE`) condition, specifying bindings between `tableFoo` and `tableBar`, nothing will be as result. MySQL allows to run query like this (with empty result), but Pribi does not offer you executing immediately after `INNER JOIN` because of useless result.
* <code>SELECT * FROM \`foo\` LEFT JOIN \`bar\`</code> on the other hand is not valid for MySQL and you will get a syntax error.
* <code>SELECT * FROM \`foo\` INNER JOIN \`bar\ ON TRUE</code> seems almost same like previous situation, but notice the trailing `ON TRUE` condition. It says "join everything with everything" and will give you every combination of all rows of both tables, which will result into `number of rows of first table` multiply `number of rows of second table` of result rows.
* <code>SELECT * FROM \`foo\` LEFT JOIN \`bar\ ON TRUE</code> seems again almost same like previous situation, which will give you again combinations of every row of every table, but notice the `LEFT` keyword, which covers situation when the second table is empty - then at least rows from the first table will be in result (extended by columns of the second table, but with NULL values everywhere, as any LEFT JOIN without condition match).
* This is valid identifier <code>\`9[;,-/\`</code>, and this too <code>\`SELECT (*_*) AS REALY?!\`</code>, if you do not forgot \`ticks\`. Like this you can name your columns, tables, databases, aliases. But seriously, do not do it, if you do not like pain badly.
* `NULL` is not a standard value, it does not mean *nothing* but much more something like *does not know*. If you want to search for `NULL` value, you will have to use `IS NULL` or `IS NOT NULL` construction. Comparing any value with `NULL` results into `NULL`, because MySQL really does not know, what `NULL` means against compared value. For example, `15 = NULL` is `NULL`, `"" = NULL` (empty string) is `NULL`, `TRUE = NULL` is `NULL` and finally `NULL = NULL` is again `NULL`. Because, remember this, MySQL does not know what is meaning of `NULL`, so comparing *unknown value* with *unknown value* has *unknown result*. For any details, try [MySQL official pages](http://dev.mysql.com/doc/refman/5.0/en/working-with-null.html).
* <code>WHERE IN ()</code> is not a valid condition and causes a syntax error because of missing parameters of `IN` condition. Using <code>\`columnFoo\` IN(NULL)</code> *matches nothing*, even if some of \`columnFoo\` value is `NULL` (which is very special, respective very unknown, as mentioned before).
* <code>\`columnFoo\` LIKE \`columnBar\`</code> condition brings same results as <code>\`columnFoo\` = \`columnBar\`</code>, but is performed much slower because of lexical value comparison and also ignores keys. Try it in our sandbox and never after. I checked this for MyISAM and InnoDB engines.
