<?php
namespace Pribi\Commands\Executions;

class OutputTester implements Tester {
	public function test($queryString) {
		echo $queryString;
	}
}
 