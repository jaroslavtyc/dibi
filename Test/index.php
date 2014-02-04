<?php
spl_autoload_register(function ($className) {
	include __DIR__ . '/../' . preg_replace('~^Pribi\\\~', '', $className) . '.php';
});

$subject = new \Pribi\Commands\Identifiers\Identifier('?');
$i = new \Pribi\Commands\Selects\Select($subject, new \Pribi\Commands\QueryOpener());
$alias = $i->as('bla');
$from = $alias->from(new \Pribi\Commands\Identifiers\Identifier('hubabuba'));
echo $from->test();