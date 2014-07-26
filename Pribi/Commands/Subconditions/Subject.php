<?php
namespace Pribi\Commands\Subconditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Conjunction;
use Pribi\Commands\AnyQueryStatements\Conditions\Disjunction;
use Pribi\Commands\AnyQueryStatements\Conditions\IsNotNull;
use Pribi\Commands\AnyQueryStatements\Conditions\IsNull;
use Pribi\Commands\WithIdentifier;

/**
 * @method and($subject) @return Conjunction
 * @method or($subject) @return Disjunction
 */
class Subject extends WithIdentifier {
	use \Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOring;

	protected function toSql() {
		return $this->getIdentifier()->toSql();
	}

	protected function conjunction($subject) {
		return new Conjunction($subject, $this, $this->getCommandBuilder());
	}

	protected function disjunction($subject) {
		return new Disjunction($subject, $this, $this->getCommandBuilder());
	}

	public function isNull() {
		return new IsNull($this, $this->getCommandBuilder());
	}

	public function isNotNull() {
		return new IsNotNull($this, $this->getCommandBuilder());
	}
}
