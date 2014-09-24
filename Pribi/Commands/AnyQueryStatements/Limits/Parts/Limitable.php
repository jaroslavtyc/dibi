<?php
namespace Pribi\Commands\AnyQueryStatements\Limits\Parts;

interface Limitable {
	public function limit($limit);

	public function offsetAndLimit($offset, $limit);
}
