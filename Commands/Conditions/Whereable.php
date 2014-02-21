<?php
namespace Pribi\Commands\Conditions;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
