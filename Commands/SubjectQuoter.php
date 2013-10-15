<?php
namespace Pribi\Commands;

use Pribi\Core\Object;

class SubjectQuoter extends Object {
	public function quoteSubject($subject) {
		if ($this->isValidIdentifier($subject)) {
			$subject = $this->quoteIdentifier($subject);
		}

		return $subject;
	}

	private function isValidIdentifier($qualifier) {
		return preg_match('~^[.\x{0001}-\x{FFFF}]$~', $qualifier);
	}

	private function quoteIdentifier($identifier) {
		$qualifiers = $this->explodeToQualifiers($identifier);
		$quoted = array();
		foreach ($qualifiers as $qualifier) {
			$quoted[] = $this->quoteQualifier($qualifier);
		}

		return $quoted;
	}

	private function explodeToQualifiers($identifier) {
		return explode('.', $identifier);
	}

	private function quoteQualifier($qualifier) {
		return '`' . $qualifier . '`';
	}

	private function hasToBeQuoted($qualifier) {
		return preg_match('~^[\x{0001}-\x{007F}]+$~', $qualifier) || preg_match('~^\d+$~', $qualifier);
	}

	private function isValidQualifier($qualifier) {
		return preg_match('~^[\x{0001}-\x{FFFF}]$~', $qualifier);
	}

	private function canBeUnquoted($qualifier) {
		return preg_match('~^[0-9a-zA-Z$_\x{0080}-\x{FFFF}]+$~', $qualifier);
	}
}
