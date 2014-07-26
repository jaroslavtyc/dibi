<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Base;

use Pribi\Commands\WithIdentifier;

abstract class Like extends WithIdentifier implements AndOrUsable {
	use AndOring;
}
