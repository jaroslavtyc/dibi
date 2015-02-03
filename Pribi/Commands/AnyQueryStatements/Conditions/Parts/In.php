<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

abstract class In extends \Pribi\Commands\Command implements AndOrUsable {

	use AndOring;

	/** @var \Pribi\Commands\Identifiers\Identifiers */
	private $identifiers;

	public function __construct(\Pribi\Commands\Identifiers\Identifiers $identifiers, \Pribi\Commands\Command $previousCommand) {
		$this->identifiers = $identifiers;
		parent::__construct($previousCommand, $this->getCommandBuilder());
	}

	/**
	 * @return \Pribi\Commands\Identifiers\Identifiers
	 */
	protected function getIdentifiers() {
		return $this->identifiers;
	}
}
