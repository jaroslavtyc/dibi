<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\UsingIdentificator;

class Partition extends UsingIdentificator {
	public function values($identificator) {
		return new Values($identificator, $this);
	}

	public function set($values) {
		return new Set($values, $this);
	}
}
