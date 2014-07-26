<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Base;

use Pribi\Commands\WithIdentifier;

abstract class Disjunction extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;
}
