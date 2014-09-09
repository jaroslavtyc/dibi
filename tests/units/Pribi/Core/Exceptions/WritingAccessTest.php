<?php
namespace Pribi\Core\Exceptions;

class WritingAccessTest extends \PHPUnit_Framework_TestCase {
	public function testIsPartOfCoreExceptionsFamily() {
		$exceptionObject = new WritingAccess();
		$this->assertTrue(is_a($exceptionObject, Exception::class));
	}

	/**
	 * @expectedException \RuntimeException
	 */
	public function testIsStandardRuntimeException() {
		throw new WritingAccess();
	}
}
