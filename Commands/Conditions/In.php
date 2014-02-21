<?php
namespace Pribi\Commands;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\Identifiers;

class In extends Command {
	use AndOring;

	/**
	 * @var Identifier[] Identifiers
	 */
	private $identifiers;

	public function __construct(Identifiers $identifiers, Command $previousCommand) {
		$this->identifiers = $this->validateIdentifiers($identifiers);
		parent::__construct($previousCommand);
	}

	private function validateIdentifiers(Identifiers $identifiers) {
		if (count($identifiers) === 0) {
			$identifiers = new Identifiers(NULL);
		}
		return $identifiers;
	}

	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}
}
