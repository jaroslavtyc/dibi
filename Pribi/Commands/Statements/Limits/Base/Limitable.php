<?php
namespace Pribi\Commands\Limits\Base;

interface Limitable {
	public function limit($limit);

	public function offsetAndLimit($offset, $limit);
}
