<?php
namespace Pribi\Commands\WhereDefinitions\Base;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
