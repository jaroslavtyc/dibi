<?php
namespace Pribi\Commands\Conditions\Base;

use Pribi\Commands\Conditions\WithoutIdentifier;

abstract class Null extends WithoutIdentifier implements AndOrUsable {
	use AndOring;
}
