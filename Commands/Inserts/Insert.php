<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\WithoutIdentificator;
use Pribi\Commands\Selects\Select;

abstract class Insert extends WithoutIdentificator {
	public function partition($identificator) {
		return new Partition($identificator, $this);
	}

	public function values($identificator) {
		return new Values($identificator, $this);
	}

	public function select($subject) {
		return new Select($subject);
	}
}
