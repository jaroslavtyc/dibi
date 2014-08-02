<?php
namespace Tests\Helpers;

abstract class CommandTestCase extends \PHPUnit_Framework_TestCase {

	private $commandBuilder;
	private $commandDummy;

	protected function setUp() {
		$this->commandBuilder = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$this->commandDummy = $this->getMockBuilder(\Pribi\Commands\Command::class)
			->disableOriginalConstructor()
			->getMockForAbstractClass();
	}

	/**
	 * @return \Pribi\Builders\CommandsBuilder
	 */
	protected function getCommandsBuilderDummy() {
		return $this->commandBuilder;
	}

	/**
	 * @return \Pribi\Commands\Command
	 */
	protected function getCommandDummy() {
		return $this->commandDummy;
	}
}
