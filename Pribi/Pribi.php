<?php
namespace Pribi;

class Pribi {

	public static function openQuery() {
		return new \Pribi\Commands\Openers\Query();
	}

	public static function subcondition() {
		return new \Pribi\Commands\Subconditions\Subcondition();
	}
}
