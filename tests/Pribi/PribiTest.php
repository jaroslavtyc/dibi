<?php
namespace Pribi;

class PribiTest extends PHPUnit_Framework_TestCase {
	public function testOpenQueryPublicStaticFunctionExists() {
		$this->assertTrue(method_exists(Pribi::class, 'openQuery'));
	}

	public function testSubconditionPublicStaticFunctionExists() {
		$this->assertTrue(method_exists(Pribi::class, 'openQuery'));
	}
}
