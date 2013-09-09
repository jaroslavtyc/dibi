Pribi (forked from [Dibi](http://dibiphp.com) - smart database layer for PHP)
=========================================================

Original [Dibi](http://dibiphp.com) is great.
Not the unified interface for any database vendor, but for the fluent interface.
And short notations of standard operations.
And for type-check of parameters, inserted similarly to printf().

And should be greater, but price for universality does not allow it.
Especially lack of prepared statements hurts these developers, who are recalculating CPU time to money.

Forbidden changes, because of final methods or whole classes, confound chance to extend Dibi itself, so fork has been enforced.
All hail the "Fluent, MySQL, prepared statements". And wish me good luck with development.

Pribi requires [PHP 5.4.0](http://php.net/releases/5_4_0.php)
or later because of [namespaces](http://php.net/manual/en/language.namespaces.php)
 ,[__callStatic()](http://www.php.net/manual/en/language.oop5.overloading.php#object.callstatic)
 ,[__DIR__](http://php.net/manual/en/language.constants.predefined.php)
 and [traits](http://php.net/traits).
