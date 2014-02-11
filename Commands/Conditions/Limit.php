<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Command;
use Pribi\Commands\WithoutIdentifier;

class Limit extends WithoutIdentifier {
	private $offset;
	private $limit;

	public function __construct($offset, $limit, Command $previousCommand) {
		$this->offset = $offset;
		$this->limit = $limit;
		parent::__construct($previousCommand);
	}

	protected function toSql() {
		return 'LIMIT ' . $this->limit . ' OFFSET ' . $this->offset;
	}
}
