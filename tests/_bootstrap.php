<?php
// This is global bootstrap for autoloading

/*
 * Simple autoloader using the PCR-0 Pribi naming convention, @see http://www.php-fig.org/psr/psr-0/
 * For example Pribi\Commands\AnyQueryStatements\Inserts\Insert is searched in "__DIR__ . '/../Pribi/Commands/Inserts/Insert.php" file.
 */

require __DIR__ . '/../vendor/autoload.php';

// helpers autoload
foreach(scandir(__DIR__ . '/unit/helpers/') as $file) {
	if (preg_match('/\.php$/', $file)) {
		require_once __DIR__ . '/unit/helpers/' . $file;
	}
}

// Pribi lazy autoload
spl_autoload_register(function ($className) {
	$classFilename = __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';
	if (file_exists($classFilename)) {
		require $classFilename;
	}
});
