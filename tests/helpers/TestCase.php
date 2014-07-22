<?php
namespace Tests\Helpers;

class TestCase extends \PHPUnit_Framework_TestCase {

	private $commandBuilder;

	protected function setUp() {
		$this->commandBuilder = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
	}

	/**
	 * @return \Pribi\Builders\CommandsBuilder
	 */
	protected function getCommandsBuilderDummy() {
		return $this->commandBuilder;
	}
}
