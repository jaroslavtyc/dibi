<?php
namespace Pribi\Executions;

class StringExecutorExplainerAndTester implements Executor, Explainer, Tester {

	public function execute($queryString) {
		return $queryString;
	}

	public function explain($queryString) {
		return $queryString;
	}

	public function test($queryString){
		return $queryString;
	}
}
