<?php
namespace Pribi\Responses;

class Result implements \Iterator {
	private $statement;
	private $result;
	private $current;
	private $key = 0;

	public function __construct(\mysqli_stmt $statement) {
		$this->statement = $statement;
	}

	public function getAffectedRows() {
		return $this->statement->affected_rows;
	}

	public function current() {
		return $this->current;
	}

	public function next() {
		$fetched = $this->result->fetch_assoc();
		if (!is_null($fetched)) {
			$this->current = new Row($fetched);
			$this->key++;
		} else {
			$this->key = NULL;
			$this->current = NULL;
		}

		return $this->current;
	}

	public function key() {
		return $this->key;
	}

	public function valid() {
		return !is_null($this->key);
	}

	public function rewind() {
		$this->key = -1;
		$this->statement->data_seek(0);
		$this->result = $this->statement->get_result();
		$this->next();
	}
}
