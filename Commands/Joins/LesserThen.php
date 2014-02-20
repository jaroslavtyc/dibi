<?php
namespace Pribi\Commands\Joins;

class LesserThen extends \Pribi\Commands\Conditions\LesserThen implements Joinable {
	use AndOring;
	use Joining;
}
