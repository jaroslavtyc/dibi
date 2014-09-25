<?php
namespace tests\integration\Select;

class Test extends \tests\integration\helpers\QueryTestCase {

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
