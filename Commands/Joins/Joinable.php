<?php
namespace Pribi\Commands\Joins;

interface Joinable {
	public function innerJoin($subject);

	public function leftJoin($subject);

	public function rightJoin($subject);
}
