<?php
namespace Pribi\Commands\Statements\Limits\Base;

interface Limitable {
	public function limit($limit);

	public function offsetAndLimit($offset, $limit);
}
