<?php
namespace Pribi\Executions;

/**
 * For default usage @see \Pribi\Executions\OutputExecutor
 */
interface Executor {
	/**
	 * @param string $stringQuery
	 * @return \Pribi\Responses\Result
	 */
	public function execute($stringQuery);
}
