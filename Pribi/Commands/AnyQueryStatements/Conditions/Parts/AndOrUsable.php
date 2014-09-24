<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

/**
 * @method \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction and($identificator)
 * @method \Pribi\Commands\AnyQueryStatements\Conditions\Disjunction or($identificator)
 */
interface AndOrUsable {

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\AndNot
	 */
	public function andNot($subject);

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\OrNot
	 */
	public function orNot($subject);
}
