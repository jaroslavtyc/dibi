<?php
/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void haveFriend($name)
 */
class IntegrationTester extends \Codeception\Actor {

	/**
	 * Checks that two variables are equal.
	 *
	 * @param        $expected
	 * @param        $actual
	 * @param string $message
	 *
	 * @return mixed
	 * @see \Codeception\Module\Asserts::assertEquals()
	 */
	public function assertEquals($expected, $actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertEquals', func_get_args()));
	}

	/**
	 * Checks that two variables are not equal
	 *
	 * @param        $expected
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertNotEquals()
	 */
	public function assertNotEquals($expected, $actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertNotEquals', func_get_args()));
	}

	/**
	 * Checks that expected is greater than actual
	 *
	 * @param        $expected
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertGreaterThan()
	 */
	public function assertGreaterThan($expected, $actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertGreaterThan', func_get_args()));
	}

	/**
	 * Checks that expected is greater or equal than actual
	 *
	 * @param        $expected
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertGreaterThanOrEqual()
	 */
	public function assertGreaterThanOrEqual($expected, $actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertGreaterThanOrEqual', func_get_args()));
	}

	/**
	 * Checks that expected is less than actual
	 *
	 * @param        $expected
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertLessThan()
	 */
	public function assertLessThan($expected, $actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertLessThan', func_get_args()));
	}

	/**
	 * Checks that expected is less or equal than actual
	 *
	 * @param        $expected
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertLessThanOrEqual()
	 */
	public function assertLessThanOrEqual($expected, $actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertLessThanOrEqual', func_get_args()));
	}

	/**
	 * Checks that haystack contains needle
	 *
	 * @param        $needle
	 * @param        $haystack
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertContains()
	 */
	public function assertContains($needle, $haystack, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertContains', func_get_args()));
	}

	/**
	 * Checks that haystack doesn't contain needle.
	 *
	 * @param        $needle
	 * @param        $haystack
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertNotContains()
	 */
	public function assertNotContains($needle, $haystack, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertNotContains', func_get_args()));
	}

	/**
	 * Checks that variable is empty.
	 *
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertEmpty()
	 */
	public function assertEmpty($actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertEmpty', func_get_args()));
	}

	/**
	 * Checks that variable is not empty.
	 *
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertNotEmpty()
	 */
	public function assertNotEmpty($actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertNotEmpty', func_get_args()));
	}

	/**
	 * Checks that variable is NULL
	 *
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertNull()
	 */
	public function assertNull($actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertNull', func_get_args()));
	}

	/**
	 * Checks that variable is not NULL
	 *
	 * @param        $actual
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertNotNull()
	 */
	public function assertNotNull($actual, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertNotNull', func_get_args()));
	}

	/**
	 * Checks that condition is positive.
	 *
	 * @param        $condition
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertTrue()
	 */
	public function assertTrue($condition, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertTrue', func_get_args()));
	}

	/**
	 * Checks that condition is negative.
	 *
	 * @param        $condition
	 * @param string $message
	 * @see \Codeception\Module\Asserts::assertFalse()
	 */
	public function assertFalse($condition, $message = NULL) {
		return $this->scenario->runStep(new \Codeception\Step\Action('assertFalse', func_get_args()));
	}

	/**
	 * Fails the test with message.
	 *
	 * @param $message
	 * @see \Codeception\Module\Asserts::fail()
	 */
	public function fail($message) {
		return $this->scenario->runStep(new \Codeception\Step\Action('fail', func_get_args()));
	}
}
