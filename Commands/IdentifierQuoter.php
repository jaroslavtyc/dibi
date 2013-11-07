<?php
namespace Pribi\Commands;

use Pribi\Core\Object;

class IdentifierQuoter extends Object {
	public function quote($subject) {
		$subject = trim($subject);
		if ($this->isNotManuallyQuoted($subject) && $this->isProbablyNotSpecial($subject) && $this->isValidIdentifier($subject)) {
			$subject = $this->process($subject);
		}

		return $subject;
	}

	private function isNotManuallyQuoted($subject) {
		return strpos($subject, '`') === FALSE;
	}

	private function isValidIdentifier($qualifier) {
		return preg_match('~^[.\x{0001}-\x{FFFF}]+$~u', $qualifier);
	}

	private function isProbablyNotSpecial($subject) {
		return preg_match('~^[.\s0-9a-zA-Z$_\x{0080}-\x{FFFF}]+$~u', $subject);
	}

	private function process($identifier) {
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

	private function hasToBeQuoted($qualifier) {
		return preg_match('~^[\x{0001}-\x{007F}]+$~u', $qualifier) || preg_match('~^\d+$~', $qualifier);
	}

	private function isValidQualifier($qualifier) {
		return preg_match('~^[\x{0001}-\x{FFFF}]+$~u', $qualifier);
	}

	private function canBeNonquoted($qualifier) {
		return preg_match('~^[0-9a-zA-Z$_\x{0080}-\x{FFFF}]+$~u', $qualifier);
	}
}
