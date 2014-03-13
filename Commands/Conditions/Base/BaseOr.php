<?php
namespace Pribi\Commands\Conditions\Base;

use Pribi\Commands\Conditions\Base\AndOring;
use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\Conditions\Base\Comparable;
use Pribi\Commands\Conditions\Base\Comparing;
use Pribi\Commands\WithIdentifier;

abstract class BaseOr extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use \Pribi\Commands\Conditions\Base\Comparing;
}
