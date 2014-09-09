<?php
namespace Pribi\Executions;

/**
 * For default usage @see \Pribi\Executions\OutputTester
 */
interface Tester {
	public function test($queryString);
}
