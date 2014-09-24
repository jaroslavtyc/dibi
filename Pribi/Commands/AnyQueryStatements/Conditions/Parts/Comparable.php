<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

interface Comparable {

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\EqualTo
	 */
	public function equalTo($subject);

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrGreaterThen
	 */
	public function equalOrGreaterThen($subject);

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrLesserThen
	 */
	public function equalOrLesserThen($subject);

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\GreaterThen
	 */
	public function greaterThen($subject);

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\LesserThen
	 */
	public function lesserThen($subject);

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\DifferentTo
	 */
	public function differentTo($subject);
}
