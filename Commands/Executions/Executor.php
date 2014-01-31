<?php
namespace Pribi\Commands\Executions;

interface Executor {
	/**
	 * @param string $stringQuery
	 * @return \Pribi\Responses\Result
	 */
	public function execute($stringQuery);
}
