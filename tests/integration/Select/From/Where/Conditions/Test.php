<?php
namespace tests\integration\Select\From\Where;

class SelectFromWhereConditions extends \tests\integration\helpers\QueryTestCase {

	public function testSelectFromWhereAnd() {
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

	public function testSelectFromWhereOr() {
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

	public function testSelectFromTableWhereAndNot() {
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

	public function testSelectFromWhereOrNot() {
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
