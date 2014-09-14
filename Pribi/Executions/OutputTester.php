<?php
namespace Pribi\Executions;

class OutputTester implements Tester {
	public function test($queryString) {
		echo $queryString;
	}
}
