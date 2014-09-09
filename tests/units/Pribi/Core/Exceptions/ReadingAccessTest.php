<?php
namespace Pribi\Core\Exceptions;

class ExecutingAccessTest extends \PHPUnit_Framework_TestCase {
	public function testIsPartOfCoreExceptionsFamily() {
		$exceptionObject = new ReadingAccess();
		$this->assertTrue(is_a($exceptionObject, Exception::class));
	}

	/**
	 * @expectedException \RuntimeException
	 */
	public function testIsStandardRuntimeException() {
		throw new ReadingAccess();
	}
}
