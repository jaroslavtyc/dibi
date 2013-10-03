<?php
namespace Pribi\Commands\Selects;
use Pribi\Commands\IdentificatorBringer;

/**
 * @method \Pribi\Commands\Selects\SelectAlias as($alias)
 */
class Select extends IdentificatorBringer {
	protected function alias($alias) {
		return new SelectAlias($alias, $this);
	}

	public function select($identificator) {
		$select = new Select($identificator, $this);

		return $select;
	}

	public function from($identificator) {
		$from = new From($identificator, $this);

		return $from;
	}

	public function where($identificator) {
		$where = new Where($identificator, $this);

		return $where;
	}

	public function limit($amount) {
		$limit = new Limit(0, $amount, $this);

		return $limit;
	}

	public function offsetLimit($offset, $amount) {
		$amount = new Limit($offset, $amount, $this);

		return $amount;
	}
}