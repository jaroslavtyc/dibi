<?php
namespace Pribi\Commands\Selects;
use Pribi\Commands\IdentificatorAlias;
use Pribi\Commands\FromSources\From;

class SelectAlias extends IdentificatorAlias {
	public function __construct($alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
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
