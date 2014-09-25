<?php
namespace tests\integration\Selects;

class SelectFromQueryTest extends \tests\integration\helpers\QueryTestCase {

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
