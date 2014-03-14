<?php
namespace Pribi\Commands\Conditions\Base;

use Pribi\Commands\WithIdentifier;

abstract class Like extends WithIdentifier implements AndOrUsable {
	use AndOring;
}
