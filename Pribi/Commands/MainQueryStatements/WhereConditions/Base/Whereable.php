<?php
namespace Pribi\Commands\MainQueryStatements\WhereConditions\Base;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
