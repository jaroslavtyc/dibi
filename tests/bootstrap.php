<?php
/*
 * Simple autoloader using the PCR-0 Pribi naming convention, @see http://www.php-fig.org/psr/psr-0/
 * For example Pribi\Commands\Inserts/Insert is searched in "__DIR__ . '/../Pribi/Commands/Inserts/Insert.php" file.
 */

require __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($className) {
	if (file_exists(__DIR__ . '/../' . str_replace('\\', '/', $className) . '.php')) {
		require __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';
	}
});
