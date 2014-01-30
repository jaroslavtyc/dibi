<?php
spl_autoload_register(function ($className) {
	include __DIR__ . '/../' . preg_replace('~^Pribi\\\~', '', $className) . '.php';
});

/*$subject = new \Pribi\Commands\Identifiers\Identifier('ss.sdf.*');
$i = new \Pribi\Commands\Selects\Select($subject, new \Pribi\Commands\QueryOpener());
echo $i->toSql();*/
