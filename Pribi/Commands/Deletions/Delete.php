<?php
namespace Pribi\Commands\Deletions;

use Pribi\Commands\Command;
use Pribi\Commands\FromSources\From;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithoutIdentifier;

class Delete extends WithoutIdentifier {
	public function __construct(Command $previousCommand) {
		parent::__construct($previousCommand);
	}

	protected function toSql() {
		return 'DELETE';
	}

	public function from($subject) {
		$from = new From(new Identifier($subject), $this);

		return $from;
	}
}
