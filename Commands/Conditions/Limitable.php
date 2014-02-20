<?php
namespace Pribi\Commands\Conditions;

interface Limitable {
	public function limit($limit);

	public function offsetAndLimit($offset, $limit);
}
