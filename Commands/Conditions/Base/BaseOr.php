<?php
namespace Pribi\Commands\Conditions\Base;

use Pribi\Commands\WithIdentifier;

abstract class BaseOr extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use \Pribi\Commands\Conditions\Base\Comparing;
}
