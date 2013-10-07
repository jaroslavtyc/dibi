<?php
namespace Pribi\Commands\Inserts;

abstract class Insert extends WithoutIdentificator {
	public function values($identificator) {
		return new Values($identificator, $this);
	}
}
