<?php
namespace Tests\Integration\Helpers;

class QueryTestCase extends \PHPUnit_Framework_TestCase {

	/** @var \Pribi\Pribi */
	protected $pribi;

	protected function setUp() {
		$outputMaker = new \Pribi\Executions\StringExecutorExplainerAndTester();
		$closingQueryBuilder = new \Pribi\Builders\ClosingQueries\Builder($outputMaker, $outputMaker, $outputMaker);
		$commandBuilder = new \Pribi\Builders\Commands\Builder($closingQueryBuilder);
		$this->pribi = new \Pribi\Pribi($commandBuilder);
	}

}
