<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithSubject;

class LikeString extends WithSubject {

	protected function toSql() {
		return 'LIKE ' . $this->getSubject()->toSql();
	}
}
