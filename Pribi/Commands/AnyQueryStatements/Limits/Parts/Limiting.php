<?php
namespace Pribi\Commands\AnyQueryStatements\Limits\Parts;

trait Limiting {

	/**
	 * @param int $limit
	 * @return \Pribi\Commands\AnyQueryStatements\Limits\Limit
	 */
	public function limit($limit) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryLimit(0, $limit, $this);
	}

	/**
	 * @param int $limit
	 * @return \Pribi\Commands\AnyQueryStatements\Limits\Limit
	 */
	public function offsetAndLimit($offset, $limit) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryLimit($offset, $limit, $this);
	}
}
