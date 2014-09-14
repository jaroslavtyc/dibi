<?php
namespace Pribi\Commands\AnyQueryStatements\Selects\Base;

use Pribi\Commands\AnyQueryStatements\FromDefinitions\From;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\AnyQueryStatements\Selects\SelectNot;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Where;
use Pribi\Commands\AnyQueryStatements\WhereConditions\WhereNot;

trait AfterSelecting {
	public function select($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$select = new \Pribi\Commands\AnyQueryStatements\Selects\Select(new Identifier($subject), $this);

		return $select;
	}

	public function selectNot($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$select = new SelectNot(new Identifier($subject), $this);

		return $select;
	}

	public function from($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$from = new From(new Identifier($subject), $this);

		return $from;
	}

	public function where($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$where = new Where(new Identifier($subject), $this);

		return $where;
	}

	public function whereNot($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$where = new WhereNot(new Identifier($subject), $this);

		return $where;
	}
}
