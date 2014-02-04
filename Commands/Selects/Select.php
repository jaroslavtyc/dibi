<?php
namespace Pribi\Commands\Selects;

use Pribi\Executions\Executable,
	Pribi\Executions\Executabling,
	Pribi\Commands\Identifiers\Identifier,
	Pribi\Commands\Identifiers\IdentifierBringer;

/**
 * @method SelectAlias as ($alias)
 */
class Select extends IdentifierBringer implements Executable, SelectIdentity {
	use Executabling;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), SelectIdentity::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'SELECT ' . $this->getIdentifier()->toSql();
		}
	}

	protected function alias(Identifier $alias) {
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