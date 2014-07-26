<?php
namespace Pribi\Commands\AnyQueryStatements\Limits\Base;

interface Limitable {
	public function limit($limit);

	public function offsetAndLimit($offset, $limit);
}
