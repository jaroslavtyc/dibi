<?php
namespace Pribi\Core\Exceptions;

class AccessTest extends \PHPUnit_Framework_TestCase {
	public function testIsPartOfCoreExceptionsFamilyByIncludingProperInterface() {
		$exceptionObject = new Access();
		$this->assertTrue(is_a($exceptionObject, Exception::class));
	}

	/**
	 * @expectedException \RuntimeException
	 */
	public function testIsStandardRuntimeException() {
		throw new Access();
	}
}
 