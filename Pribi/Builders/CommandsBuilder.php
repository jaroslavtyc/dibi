<?php
namespace Pribi\Builders;

use Pribi\Commands\Command;
use Pribi\Commands\Deletions\Delete;
use Pribi\Commands\FromSources\From;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\Identifiers;
use Pribi\Commands\Inserts\InsertIgnoreInto;
use Pribi\Commands\Inserts\InsertInto;
use Pribi\Commands\Selects\Select;
use Pribi\Commands\Selects\SelectAlias;
use Pribi\Core\Object;

class CommandsBuilder extends Object {
	public function createIdentifier($subject) {
		return new Identifier($subject);
	}

	public function createIdentifiers($subjects) {
		return new Identifiers($subjects);
	}

	public function createSelect(Identifier $identifier, Command $previousCommand) {
		return new Select($identifier, $previousCommand, $this);
	}

	public function createSelectAlias(Identifier $alias, Select $prependSelect) {
		return new SelectAlias($alias, $prependSelect, $this);
	}

	public function createInsertInto(
		Identifier $tableIdentifier,
		Command $previousCommand,
		Identifiers $columnsIdentifiers
	) {
		return new InsertInto($tableIdentifier, $previousCommand, $this, $columnsIdentifiers);
	}

	public function createInsertIgnoreInto(
		Identifier $tableIdentifier,
		Command $previousCommand,
		Identifiers $columnsIdentifiers
	) {
		return new InsertIgnoreInto($tableIdentifier, $previousCommand, $this, $columnsIdentifiers);
	}

	public function createDelete(Identifier $identifier, Command $previousCommand) {
		return new Delete($identifier, $previousCommand, $this);
	}

	public function createFrom(Identifier $fromSource, Command $previousCommand) {
		return new From($fromSource, $previousCommand, $this);
	}
}
