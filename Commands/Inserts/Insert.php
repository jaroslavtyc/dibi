<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\WithoutIdentificator;

class Insert extends WithoutIdentificator {
	public function into($identificator) {
		return new Into($identificator, $this);
	}
}
