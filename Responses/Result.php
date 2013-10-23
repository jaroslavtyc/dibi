<?php
namespace Pribi\Responses;

class Result implements \Iterator {
	private $statement;
	private $current;
	private $key = 0;

	public function __construct(\PDOStatement $statement) {
		$this->statement = $statement;
	}

	public function getAffectedRows() {
		return $this->statement->rowCount();
	}

	public function fetchArray() {
		return new $this->statement->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function current() {
		return $this->current;
	}

	public function next() {
		$fetched = $this->statement->fetch(\PDO::FETCH_ASSOC);
		if ($fetched !== FALSE) {
			$this->current = new Row($fetched);
			$this->key++;
		} else {
			$this->key = FALSE;
			$this->current = FALSE;
		}

		return $this->current;
	}

	public function key() {
		return $this->key;
	}

	public function valid() {
		return $this->key !== FALSE;
	}

	public function rewind() {
		throw new ResultCanNotBeRewind();
	}
}
