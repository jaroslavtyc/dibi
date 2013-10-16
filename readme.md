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
	- Pribi is for MySQL. Thats the trick. That means, the quotation is done by \` (tick).
	Not SQL-99 standard by " (double quote), not MS SQL standard by \[\] (brackets) or anything else. Only \`ticks\`.
**Aliasing**
	- Use fluent interface. Everytime its possible. And that should be everytime. For alias, use select('columnName')->as('prettyAlias');
	If you want try to use shorthand as 'columnName prettyAlias', that means two stings split by white space, you will have to wrap both identifiers.
	Otherwise Pribi will wrap your string as single identifier: 'columnName prettyAlias' = `columnName prettyAlias`.
	Yes, this is valid name. By the way, this is also valid `9[;,-/`. And this too `SELECT (*_*) AS REALY?!`.
	So again, use fluent. Everytime.