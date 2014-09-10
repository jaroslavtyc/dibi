<?php
namespace tests\integrations\Selects;

use Pribi\Builders\ClosingQueries\Builder;
use Pribi\Executions\StringExecutorExplainerAndTester;
use Pribi\Pribi;

class SelectQueryTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var Pribi
	 */
	private $pribi;

	protected function setUp() {
		$outputMaker = new StringExecutorExplainerAndTester();
		$closingQueryBuilder = new Builder($outputMaker, $outputMaker, $outputMaker);
		$commandBuilder = new \Pribi\Builders\Commands\Builder($closingQueryBuilder);
		$this->pribi = new Pribi($commandBuilder);
	}

	public function testCanSelectNumericConstant() {
		$this->assertSame(
			'SELECT 1',
			$this->pribi->openQuery()->select('1')
				->execute()
		);
	}

	public function testCanSelectStringConstant() {
		$this->assertSame(
			'SELECT "foo"',
			$this->pribi->openQuery()->select('"foo"')
				->execute()
		);
		$this->assertSame(
			"SELECT 'foo'",
			$this->pribi->openQuery()->select("'foo'")
				->execute()
		);
	}
}
