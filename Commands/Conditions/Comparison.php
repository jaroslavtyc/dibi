<?php
namespace Pribi\Commands\Conditions;

interface Comparison {
	public function equalTo($subject);

	public function equalOrGreaterThen($subject);

	public function equalOrLesserThen($subject);

	public function greaterThen($subject);

	public function lesserThen($subject);

	public function differentTo($subject);
}
