<?php
namespace tests\integrations\Selects;

class SelectQueryTest extends \PHPUnit_Framework_TestCase {

	/** @var \Pribi\Pribi */
	private $pribi;

	protected function setUp() {
		$outputMaker = new \Pribi\Executions\StringExecutorExplainerAndTester();
		$closingQueryBuilder = new \Pribi\Builders\ClosingQueries\Builder($outputMaker, $outputMaker, $outputMaker);
		$commandBuilder = new \Pribi\Builders\Commands\Builder($closingQueryBuilder);
		$this->pribi = new \Pribi\Pribi($commandBuilder);
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

	public function testCanSelectFromTable() {
		$this->assertSame(
			'SELECT `foo` FROM `bar`',
			$this->pribi->openQuery()->select('foo')
				->from('bar')
				->execute()
		);
	}
}
