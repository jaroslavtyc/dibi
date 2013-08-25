<?php
namespace Pribi\Commands;

use Pribi\Commands\Fluent;

class Selection extends Fluent {
	private $identificator;

	public function __construct() {
		$this->aliasedSelection = new AliasedSelection($this);
	}

	public function select($identificator) {
		$this->identificator = (string) $identificator;

		return $this->getNextToFluid();
	}

	/**
	 * @return AliasedSelection
	 */
	protected function getNextToFluid() {
		return $this->aliasedSelection;
	}
}