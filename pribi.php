<?php
class pribi {
	/**
	 * @return \Pribi\Commands\Fluent
	 */
	public static function fluent() {
		return new \Pribi\Commands\Fluent();
	}

	/**
	 * @return \Pribi\Commands\Subconditions\Subcondition
	 */
	public static function subcondition() {
		return new \Pribi\Commands\Subconditions\Subcondition();
	}
}
