<?php
namespace Pribi\Commands\AnyQueryStatements\Limits;

use Pribi\Builders\Commands\Builder;
use Pribi\Commands\Command;
use Pribi\Commands\WithoutIdentifier;

class Limit extends WithoutIdentifier {
	private $offset;
	private $limit;

	/**
	 * @param int $offset
	 * @param int $limit
	 * @param Command $previousCommand
	 * @param Builder $commandBuilder
	 */
	public function __construct($offset, $limit, Command $previousCommand, Builder $commandBuilder) {
		$this->offset = $offset;
		$this->limit = $limit;
		parent::__construct($previousCommand, $commandBuilder);
	}

	protected function toSql() {
		return 'LIMIT ' . $this->limit . ($this->offset > 0 ? (' OFFSET ' . $this->offset) : '');
	}
}
