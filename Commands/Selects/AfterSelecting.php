<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Conditions\Where;
use Pribi\Commands\Conditions\WhereNot;
use Pribi\Commands\FromSources\From;

trait AfterSelecting {
	public function select($identificator) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$select = new Select($identificator, $this);

		return $select;
	}

	public function selectNot($identificator) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$select = new SelectNot($identificator, $this);

		return $select;
	}

	public function from($identificator) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$from = new From($identificator, $this);

		return $from;
	}

	public function where($identificator) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$where = new Where($identificator, $this);

		return $where;
	}

	public function whereNot($identificator) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$where = new WhereNot($identificator, $this);

		return $where;
	}
}
