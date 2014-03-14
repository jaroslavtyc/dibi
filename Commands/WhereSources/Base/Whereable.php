<?php
namespace Pribi\Commands\WhereSources\Base;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
