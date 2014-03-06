<?php
namespace Pribi\Commands\WhereSources;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
