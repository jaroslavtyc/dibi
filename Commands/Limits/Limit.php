<?php
namespace Pribi\Commands\Limits;

use Pribi\Commands\Command;
use Pribi\Commands\WithoutIdentifier;

class Limit extends WithoutIdentifier {
	private $offset;
	private $limit;

	/**
	 * @param int $offset
	 * @param int $limit
	 * @param Command $previousCommand
	 */
	public function __construct($offset, $limit, Command $previousCommand) {
		$this->offset = $offset;
		$this->limit = $limit;
		parent::__construct($previousCommand);
	}

	protected function toSql() {
		return 'LIMIT ' . $this->limit . ($this->offset > 0 ? (' OFFSET ' . $this->offset) : '');
	}
}
