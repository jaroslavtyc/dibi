<?php
namespace Pribi\Executions;

interface Executor {
	/**
	 * @param string $stringQuery
	 * @return \Pribi\Responses\Result
	 */
	public function execute($stringQuery);
}
