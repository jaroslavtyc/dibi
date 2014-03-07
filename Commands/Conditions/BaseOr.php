<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

abstract class BaseOr extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;
}
