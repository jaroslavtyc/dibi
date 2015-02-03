<?php
namespace Pribi\Commands;

use Pribi\Core\Object;

abstract class QueryPart extends Object {

	abstract protected function toSql();
}
