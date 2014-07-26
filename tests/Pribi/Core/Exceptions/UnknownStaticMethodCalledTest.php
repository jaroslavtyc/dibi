<?php
namespace Pribi\Core\Exceptions;

class UnknownStaticMethodCalledTest extends \PHPUnit_Framework_TestCase {
	public function testIsPartOfCoreExceptionsFamilyByIncludingProperInterface() {
		$exceptionObject = new UnknownStaticMethodCalled();
		$this->assertTrue(is_a($exceptionObject, Exception::class));
	}

	/**
	 * @expectedException \RuntimeException
	 */
	public function testIsStandardRuntimeException() {
		throw new UnknownStaticMethodCalled();
	}
}
