<?php
namespace Pribi\Commands\Conditions\Base;

use Pribi\Commands\Conditions\Base\AndOring;
use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\Conditions\WithoutIdentifier;

abstract class BaseNull extends WithoutIdentifier implements AndOrUsable {
	use AndOring;
}
