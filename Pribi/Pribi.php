<?php
namespace Pribi;

use Pribi\Builders\CommandsBuilder;

class Pribi {

	public static function openQuery() {
		return new \Pribi\Commands\Openers\Query(new CommandsBuilder());
	}

	public static function subcondition() {
		return new \Pribi\Commands\Subconditions\Subcondition(new CommandsBuilder());
	}
}
