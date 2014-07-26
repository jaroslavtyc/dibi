<?php
namespace Pribi\Core\Exceptions;

class UnknownMethodCalledTest extends \PHPUnit_Framework_TestCase {
	public function testIsPartOfCoreExceptionsFamilyByIncludingProperInterface() {
		$exceptionObject = new UnknownMethodCalled();
		$this->assertTrue(is_a($exceptionObject, Exception::class));
	}

	/**
	 * @expectedException \RuntimeException
	 */
	public function testIsStandardRuntimeException() {
		throw new UnknownMethodCalled();
	}
}
