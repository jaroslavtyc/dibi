<?php
namespace Pribi\Core\Exceptions;

class ExecutingPermissionTest extends \PHPUnit_Framework_TestCase {

	public function testIsPartOfCoreExceptionsFamilyByIncludingProperInterface() {
		$exceptionObject = new ExecutingPermission();
		$this->assertTrue(is_a($exceptionObject, Exception::class));
	}

	/**
	 * @expectedException \RuntimeException
	 */
	public function testIsStandardRuntimeException() {
		throw new ExecutingPermission();
	}
}
