<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Commands\QueryPart;

class Subject extends QueryPart {
	private $string;
	private $quoted;

	public function __construct($string) {
		$this->string = $string;
		$this->quoted = $this->quote($string);
	}

	private function quote($value) {
		if ($this->isString($value)) {
			if ($this->isNotManuallyQuoted($value)) {
				$value = $this->quoteIt($value);
			}
		} elseif (is_null($value)) {
			$value = 'NULL';
		}

		return $value;
	}

	private function isString($subject) {
		return is_string($subject) || (is_object($subject) && method_exists($subject, '__toString'));
	}

	private function isNotManuallyQuoted($subject) {
		return strpos($subject, '"') === FALSE && strpos($subject, "'") === FALSE;
	}

	private function quoteIt($string) {
		return '"' . $string . '"';
	}

	public function toSql() {
		return $this->quoted;
	}
}
