<?php
namespace Pribi\Responses;

class Result implements \Iterator {
	private $statement;
	/**
	 * @var \mysqli_result
	 */
	private $result;
	private $current;
	private $key;

	public function __construct(\mysqli_stmt $statement) {
		$this->statement = $statement;
	}

	public function __destruct() {
		if (isset($this->result)) {
			$this->result->free();
		}
	}

	public function getAffectedRows() {
		return $this->statement->affected_rows;
	}

	/**
	 * @return Row|NULL
	 */
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
		if (is_null($this->result)) {
			$this->key = -1;
			$this->result = $this->statement->get_result();
			if (!$this->result) {
				$this->reportResultError($this->statement);
			}
			$this->next();
		} else {
			throw new Exceptions\Result('Repeated rewind is not supported');
		}
	}

	private function reportResultError(\mysqli_stmt $statement) {
		throw new Exceptions\Result($statement->error, $statement->errno);
	}
}
