<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

use Pribi\Commands\WithIdentifier;

abstract class Like extends WithIdentifier implements AndOrUsable {
	use AndOring;
}
