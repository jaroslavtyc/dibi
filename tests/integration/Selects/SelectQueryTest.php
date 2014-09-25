<?php
namespace tests\integration\Selects;

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

	public function testCanSelectFromTableWhereSomething() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->execute()
		);
	}

	public function testCanSelectFromTableWhereSomethingAndSomethingElse() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` AND `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->and('qux')
				->execute()
		);
	}

	public function testCanSelectFromTableWhereSomethingOrSomethingElse() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` OR `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->or('qux')
				->execute()
		);
	}

	public function testCanSelectFromTableWhereSomethingAndNotSomethingElse() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` AND NOT `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->andNot('qux')
				->execute()
		);
	}

	public function testCanSelectFromTableWhereSomethingOrNotSomethingElse() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` OR NOT `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->orNot('qux')
				->execute()
		);
	}
}
