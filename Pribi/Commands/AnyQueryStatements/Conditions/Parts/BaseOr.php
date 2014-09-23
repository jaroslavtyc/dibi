<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

use Pribi\Commands\WithIdentifier;

abstract class Disjunction extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;
}
