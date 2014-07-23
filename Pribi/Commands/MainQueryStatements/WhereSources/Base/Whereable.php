<?php
namespace Pribi\Commands\MainQueryStatements\WhereSources\Base;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
