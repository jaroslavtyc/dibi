<?php
namespace Pribi\Commands\Executions;

class OutputExecutor implements Executor {
	public function execute($stringQuery) {
		echo $stringQuery;
	}
}
