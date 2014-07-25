<?php
namespace Pribi\Core;

class ObjectTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @expectedException \Pribi\Core\Exceptions\ReadingAccess
	 */
	public function testReadingUndefinedPropertyCauseException() {
		$object = $this->createObjectInstance();
		$object->bar;
	}

	private function createObjectInstance() {
		return $this->getMockForAbstractClass(Object::class);
	}

	/**
	 * @expectedException \Pribi\Core\Exceptions\WritingAccess
	 */
	public function testSettingUndefinedPropertyCauseException() {
		$object = $this->createObjectInstance();
		$object->foo = 'bar';
	}

	/**
	 * @expectedException \Pribi\Core\Exceptions\UnknownMethodCalled
	 */
	public function testCallingUndefinedInstanceMethodCauseException() {
		$object = $this->createObjectInstance();
		$object->foo();
	}

	/**
	 * @expectedException \Pribi\Core\Exceptions\UnknownStaticMethodCalled
	 */
	public function testCallingUndefinedStaticMethodCauseException() {
		Object::foo();
	}

	/**
	 * @expectedException \Pribi\Core\Exceptions\UnknownMethodCalled
	 */
	public function testCallingObjectAsAMethodWithoutInvokeMagicMethodCauseException() {
		$object = $this->createObjectInstance();
		$object();
	}
}
