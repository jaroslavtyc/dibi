<?php
namespace Pribi\MainQueryCommands\WhereSources\Base;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
