<?php
namespace Pribi\Commands;

/**
 * @method as($alias)
 */
class AliasedSelection extends Selection {
	use Alias;

	private $selection;
	private $alias;

	public function __construct(Selection $selection) {
		$this->selection = $selection;
	}

	/**
	 * @return Selection
	 */
	protected function getNextToFluid() {
		return $this->selection;
	}

	protected function alias($alias) {
		$this->alias = (string) $alias;
	}
}