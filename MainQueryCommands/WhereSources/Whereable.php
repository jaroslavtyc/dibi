<?php
namespace Pribi\MainQueryCommands\WhereSources;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
