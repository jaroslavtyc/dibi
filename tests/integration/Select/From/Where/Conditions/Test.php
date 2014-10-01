<?php
namespace tests\integration\Select\From\Where;

class SelectFromWhereConditions extends \tests\integration\helpers\QueryTestCase {

	public function testAnd() {
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

	public function testOr() {
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

	public function testAndNot() {
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

	public function testOrNot() {
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

	public function testGreaterThen() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` > `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->greaterThen('qux')
				->execute()
		);
	}

	public function testEqualOrGreaterThen() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` >= `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->equalOrGreaterThen('qux')
				->execute()
		);
	}

	public function testEqualTo() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` = `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->equalTo('qux')
				->execute()
		);
	}

	public function testEqualOrLesserThen() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` <= `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->equalOrLesserThen('qux')
				->execute()
		);
	}

	public function testLesserThen() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` < `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->lesserThen('qux')
				->execute()
		);
	}

	public function testNotEqualTo() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` != `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->notEqualTo('qux')
				->execute()
		);
	}

	public function testDifferentTo() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz` <> `qux`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->differentTo('qux')
				->execute()
		);
	}

}
