<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions\Parts;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
