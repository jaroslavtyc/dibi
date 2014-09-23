<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

use Pribi\Commands\WithoutIdentifier;

abstract class Null extends WithoutIdentifier implements AndOrUsable {
	use AndOring;
}
