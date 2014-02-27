<?php
namespace Pribi\Commands\Limits;

interface Limitable {
	public function limit($limit);

	public function offsetAndLimit($offset, $limit);
}
