<?php
spl_autoload_register(function ($className) {
	include __DIR__ . '/../' . preg_replace('~^Pribi\\\~', '', $className) . '.php';
});

$subject = new \Pribi\Commands\Identifiers\Identifier(12);
$i = new \Pribi\Commands\Selects\Select($subject, new \Pribi\Commands\QueryOpener());
$alias = $i->as('bla');
echo $alias->test();