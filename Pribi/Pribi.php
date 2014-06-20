<?php
namespace Pribi;

class Pribi {
	/**
	 * @return \Pribi\Commands\QueryOpener
	 */
	public static function openQuery() {
		return new \Pribi\Commands\QueryOpener();
	}

	/**
	 * @return \Pribi\Commands\Subconditions\Subcondition
	 */
	public static function subcondition() {
		return new \Pribi\Commands\Subconditions\Subcondition();
	}
}
