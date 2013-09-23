<?php
namespace Pribi\Commands\Conditions;

abstract class Disjunction extends UsingIdentificator {
	use AndOrNegating;

	abstract public function equalTo($identificator);

	abstract public function equalOrGreaterThen($identificator);

	abstract public function equalOrLesserThen($identificator);

	abstract public function greaterThen($identificator);

	abstract public function lesserThen($identificator);

	abstract public function differentTo($identificator);
}
