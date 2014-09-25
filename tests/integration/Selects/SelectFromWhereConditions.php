<?php
namespace tests\integration\Selects;

class SelectFromWhereConditions extends \tests\integration\helpers\QueryTestCase {

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
