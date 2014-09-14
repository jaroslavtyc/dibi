<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Base\Joinable;

class GreaterThen extends \Pribi\Commands\AnyQueryStatements\Conditions\GreaterThen implements Joinable {
	use AndOring;
	use Joining;
}
