<?php
namespace Pribi\Builders;

class CommandsBuilder extends \Pribi\Core\Object {
	public function createIdentifier($subject) {
		return new \Pribi\Commands\Identifiers\Identifier($subject);
	}

	public function createIdentifiers($subjects) {
		return new \Pribi\Commands\Identifiers\Identifiers($subjects);
	}

	public function createQuery(){
		return new \Pribi\Commands\Openers\Query($this);
	}

	public function createSubcondition(){
		return new \Pribi\Commands\Subconditions\Subcondition($this);
	}

	public function createSelect(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\Selects\Select($identifier, $previousCommand, $this);
	}

	public function createSelectAlias(\Pribi\Commands\Identifiers\Identifier $alias, \Pribi\Commands\Selects\Select $prependSelect) {
		return new \Pribi\Commands\Selects\SelectAlias($alias, $prependSelect, $this);
	}

	public function createInsertInto(
		\Pribi\Commands\Identifiers\Identifier $tableIdentifier,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Commands\Identifiers\Identifiers $columnsIdentifiers
	) {
		return new \Pribi\Commands\Inserts\InsertInto($tableIdentifier, $previousCommand, $this, $columnsIdentifiers);
	}

	public function createInsertIgnoreInto(
		\Pribi\Commands\Identifiers\Identifier $tableIdentifier,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Commands\Identifiers\Identifiers $columnsIdentifiers
	) {
		return new \Pribi\Commands\Inserts\InsertIgnoreInto($tableIdentifier, $previousCommand, $this, $columnsIdentifiers);
	}

	public function createDelete(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\Deletions\Delete($identifier, $previousCommand, $this);
	}

	public function createFrom(\Pribi\Commands\Identifiers\Identifier $fromSource, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\FromSources\From($fromSource, $previousCommand, $this);
	}
}
