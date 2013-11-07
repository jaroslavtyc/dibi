<?php
namespace Pribi\Commands;

interface Executor {
	/**
	 * @param string $stringQuery
	 * @return \Pribi\Responses\Result
	 */
	public function execute($stringQuery);
}
