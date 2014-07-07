<?php
namespace Pribi;

use Pribi\Commands\QueryOpener;
use Pribi\Commands\Subconditions\Subcondition;

class PribiTest extends \PHPUnit_Framework_TestCase {
	public function testOpenQueryAsPublicStaticFunctionExists() {
		$reflection = new \ReflectionClass(Pribi::class);
		$this->assertTrue($reflection->hasMethod('openQuery'));
		$methodReflection = $reflection->getMethod('openQuery');
		$this->assertTrue($methodReflection->isPublic());
		$this->assertTrue($methodReflection->isStatic());
	}

	public function testCanGiveQueryOpener() {
		$this->assertEquals(new QueryOpener(), Pribi::openQuery());
	}

	public function testEveryGivenQueryOpenerIsANewInstance() {
		$this->assertNotSame(Pribi::openQuery(), Pribi::openQuery());
	}

	public function testSubconditionAsPublicStaticFunctionExists() {
		$reflection = new \ReflectionClass(Pribi::class);
		$this->assertTrue($reflection->hasMethod('subcondition'));
		$methodReflection = $reflection->getMethod('subcondition');
		$this->assertTrue($methodReflection->isPublic());
		$this->assertTrue($methodReflection->isStatic());
	}

	public function testCanGiveSubcondition() {
		$this->assertEquals(new Subcondition(), Pribi::subcondition());
	}

	public function testEveryGivenSubconditionIsANewInstance() {
		$this->assertNotSame(Pribi::subcondition(), Pribi::subcondition());
	}
}
