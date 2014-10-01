<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

class GreaterThen extends \Pribi\Commands\AnyQueryStatements\Conditions\GreaterThen
	implements \Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable {

	use \Pribi\Commands\AnyQueryStatements\Joins\Parts\AndOring;
	use Joining;
}
