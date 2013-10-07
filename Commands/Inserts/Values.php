<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\FollowingCommand;

class Values extends FollowingCommand {
	private $values;

	public function __construct($values, Insert $into) {
		$this->values = $values;
		parent::__construct($into);
	}

	public function innerJoin($identificator) {
		return new InnerJoin($identificator, $this);
	}

	public function leftJoin($identificator) {
		return new LeftJoin($identificator, $this);
	}

	public function rightJoin($identificator) {
		return new RightJoin($identificator, $this);
	}

	public function where($identificator) {
		return new Where($identificator, $this);
	}

	public function limit($limit) {
		return new Limit(0, $limit);
	}

	public function offsetLimit($offset, $limit) {
		return new Limit($offset, $limit);
	}
}
