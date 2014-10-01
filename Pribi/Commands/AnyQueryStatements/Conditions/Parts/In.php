<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

abstract class In extends \Pribi\Commands\Command implements AndOrUsable {

	use AndOring;

	/** @var \Pribi\Commands\Identifiers\Identifiers */
	private $identifiers;

	public function __construct(\Pribi\Commands\Identifiers\Identifiers $identifiers, \Pribi\Commands\Command $previousCommand) {
		$this->identifiers = $this->sanitizeAmountOfIdentifiers($identifiers);
		parent::__construct($previousCommand, $this->getCommandBuilder());
	}

	private function sanitizeAmountOfIdentifiers(\Pribi\Commands\Identifiers\Identifiers $identifiers) {
		if (count($identifiers) === 0) {
			// will be resolved as IN (NULL), which is always false
			$identifiers = $this->getCommandBuilder()->createIdentifiers([null]);
		}
		return $identifiers;
	}

	/**
	 * @return \Pribi\Commands\Identifiers\Identifiers
	 */
	protected function getIdentifiers() {
		return $this->identifiers;
	}
}
