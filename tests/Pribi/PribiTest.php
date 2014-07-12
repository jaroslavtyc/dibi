<?php
namespace Pribi;

use Pribi\Commands\Openers\Query;
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
		$queryOpener = Pribi::openQuery();
		$this->assertNotNull($queryOpener);
		$this->assertEquals(Query::class, get_class($queryOpener));
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
		$subcondition = Pribi::subcondition();
		$this->assertNotNull($subcondition);
		$this->assertEquals(Subcondition::class, get_class($subcondition));
	}

	public function testEveryGivenSubconditionIsANewInstance() {
		$this->assertNotSame(Pribi::subcondition(), Pribi::subcondition());
	}
}
