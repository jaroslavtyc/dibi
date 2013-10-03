<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Command;

interface Comparsion extends Command {
	public function equalTo($identificator);

	public function equalOrGreaterThen($identificator);

	public function equalOrLesserThen($identificator);

	public function greaterThen($identificator);

	public function lesserThen($identificator);

	public function differentTo($identificator);
}
