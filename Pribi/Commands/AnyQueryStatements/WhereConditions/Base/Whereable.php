<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions\Base;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
