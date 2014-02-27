<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Limits\Limitable;
use Pribi\Commands\Limits\Limiting;

class EqualOrGreaterThen extends \Pribi\Commands\Conditions\EqualOrGreaterThen implements Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
