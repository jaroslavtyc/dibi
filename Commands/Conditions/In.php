<?php
namespace Pribi\Commands;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\Identifiers;
use Pribi\Commands\Identifiers\NullIdentifier;

class In extends Command {
	use AndOring;

	/**
	 * @var Identifier[]
	 */
	private $identifiers;

	public function __construct(Identifiers $identifiers, Command $previousCommand) {
		$this->identifiers = $this->validateIdentifiers($identifiers);
		parent::__construct($previousCommand);
	}

	private function validateIdentifiers($identifiers) {
		if (count($identifiers) === 0) {
			$identifiers = array(new NullIdentifier());
		}

		return $identifiers;
	}

	protected function toSql() {
		$sql = 'IN (';
		$delimiter = '';
		foreach ($this->identifiers as $identifier) {
			$sql .= $delimiter . $identifier->toSql();
			$delimiter = ',';
		}

		return $sql . ')';
	}
}
