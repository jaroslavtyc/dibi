<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOrUsable;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;

class EqualOrLesserThen extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrLesserThen implements AndOrUsable, Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
