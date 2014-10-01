<?php
namespace tests\integration\Select\From;

class Test extends \tests\integration\helpers\QueryTestCase {

	public function testCanSelectFrom() {
		$this->assertSame(
			'SELECT `foo` FROM `bar`',
			$this->pribi->openQuery()->select('foo')
				->from('bar')
				->execute()
		);
	}

}
