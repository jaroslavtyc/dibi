<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\WithIdentifier;

class Partition extends WithIdentifier {
	public function values($identificator) {
		return new Values($identificator, $this);
	}

	public function set($values) {
		return new Set($values, $this);
	}
}
