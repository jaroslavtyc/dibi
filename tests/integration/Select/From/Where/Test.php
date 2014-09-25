<?php
namespace tests\integration\Select\From\Where;

class SelectFromWhereQueryTest extends \tests\integration\helpers\QueryTestCase {

	public function testSelectFromWhere() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` WHERE `baz`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->where('baz')
				->execute()
		);
	}

}
