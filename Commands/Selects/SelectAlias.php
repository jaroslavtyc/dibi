<?php
namespace Pribi\Commands\Selects;
use Pribi\Commands\IdentificatorAlias;

class SelectAlias extends IdentificatorAlias {
	public function __construct($alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
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

	public function offsetLimit($offset, $limit) {
		$limit = new Limit($offset, $limit, $this);

		return $limit;
	}
}
