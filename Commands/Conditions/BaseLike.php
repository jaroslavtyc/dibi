<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

abstract class BaseLike extends WithIdentifier implements AndOrUsable {
	use AndOring;
}
