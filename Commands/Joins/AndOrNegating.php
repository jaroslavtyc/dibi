<?php
namespace Pribi\Commands\Joins;

/**
 * @method Negation not($subject)
 * @method Conjunction and($subject)
 * @method Disjunction or($subject)
 */
trait AndOrNegating {
	use \Pribi\Commands\Conditions\AndOrNegating;
}
