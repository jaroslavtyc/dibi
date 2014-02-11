<?php
namespace Pribi\Commands\Joins;

/**
 * @method Conjunction and($subject)
 * @method Disjunction or($subject)
 */
trait AndOring {
	use \Pribi\Commands\Conditions\AndOring;
}
