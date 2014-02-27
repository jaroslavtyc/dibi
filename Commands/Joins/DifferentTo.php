<?php
namespace Pribi\Commands\Joins;

class DifferentTo extends \Pribi\Commands\Conditions\DifferentTo implements Joinable {
	use AndOring;
	use Joining;
}
