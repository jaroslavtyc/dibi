<?php
namespace tests\integration\Select\From\Join;

class Test extends \tests\integration\helpers\QueryTestCase {

	public function testCanSelectFromInnerJoin() {
		$this->assertSame(
			'SELECT `foo` FROM `bar` INNER JOIN `baz`',
			$this->pribi->openQuery()
				->select('foo')
				->from('bar')
				->innerJoin('baz')
				->execute()
		);
	}

}
