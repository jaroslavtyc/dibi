<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Base\Joinable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;

class EqualOrGreaterThen extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrGreaterThen implements Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
