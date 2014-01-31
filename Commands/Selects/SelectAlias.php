<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Executions\Executable;
use Pribi\Commands\Executions\Executabling;
use Pribi\Commands\FromSources\From;
use Pribi\Commands\Identifiers\IdentifierAlias;

class SelectAlias extends IdentifierAlias implements Executable, SelectIdentity {
	use Executabling;

	public function __construct($alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}

	public function select($identificator) {
		return new Select($identificator, $this);
	}

	public function from($identificator) {
		return new From($identificator, $this);
	}

	public function where($identificator) {
		return new Where($identificator, $this);
	}

	public function limit($amount) {
		return new Limit(0, $amount, $this);
	}

	public function offsetLimit($offset, $limit) {
		return new Limit($offset, $limit, $this);
	}
}
