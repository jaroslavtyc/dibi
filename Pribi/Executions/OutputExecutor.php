<?php
namespace Pribi\Executions;

class OutputExecutor implements Executor {
	public function execute($stringQuery) {
		echo $stringQuery;
	}
}
