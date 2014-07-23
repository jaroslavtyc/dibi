<?php
namespace Pribi\Commands\Selects\Base;

use Pribi\Commands\FromDefinitions\From;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Selects\SelectNot;
use Pribi\Commands\WhereDefinitions\Where;
use Pribi\Commands\WhereDefinitions\WhereNot;

trait AfterSelecting {
	public function select($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$select = new \Pribi\Commands\Selects\Select(new Identifier($subject), $this);

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
