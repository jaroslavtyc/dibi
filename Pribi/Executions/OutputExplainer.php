<?php
namespace Pribi\Executions;

class OutputExecutorExplainerTester implements Executor, Explainer, Tester {

	public function execute($queryString) {
		echo '"executing" ' . $queryString;
	}

	public function explain($queryString) {
		echo '"explaining" ' . $queryString;
	}

	public function test($queryString){
		echo '"testing" ' . $queryString;
	}
}
