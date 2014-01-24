<?php
namespace Pribi\Commands;

class Identifier extends QueryPart {
	private $subject;
	private $quoted;

	public function __construct($subject) {
		$this->subject = $subject;
		$this->quoted = $this->quote($subject);
	}

	private function quote($subject) {
		$subject = trim($subject);
		if ($this->isNotManuallyQuoted($subject) && $this->isProbablyNotSpecial($subject) && $this->isValidIdentifier($subject)) {
			$subject = $this->quoteIt($subject);
		}

		return $subject;
	}

	private function isNotManuallyQuoted($subject) {
		return strpos($subject, '`') === FALSE;
	}

	private function isValidIdentifier($qualifier) {
		return (bool)preg_match('~^[.\x{0001}-\x{FFFF}]+$~u', $qualifier);
	}

	private function isProbablyNotSpecial($subject) {
		return (bool)preg_match('~^[.\s0-9a-zA-Z$_\x{0080}-\x{FFFF}]+$~u', $subject);
	}

	private function quoteIt($identifier) {
		$qualifiers = $this->explodeToQualifiers($identifier);
		$quoted = array();
		foreach ($qualifiers as $qualifier) {
			$quoted[] = $this->quoteQualifier($qualifier);
		}

		return $this->implodeToIdentifier($quoted);
	}

	private function explodeToQualifiers($identifier) {
		return explode('.', $identifier);
	}

	private function quoteQualifier($qualifier) {
		return '`' . $qualifier . '`';
	}

	private function implodeToIdentifier(array $qualifiers) {
		return implode('.', $qualifiers);
	}

	protected function toSql() {
		return $this->quoted;
	}
}
