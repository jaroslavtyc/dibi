<?php
namespace Pribi\Commands\Joins;

class GreaterThen extends \Pribi\Commands\Conditions\GreaterThen implements Joinable {
	use AndOring;
	use Joining;
}
