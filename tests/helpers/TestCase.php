<?php
namespace Tests\Helpers;

use Pribi\Builders\CommandsBuilder;

class TestCase extends \PHPUnit_Framework_TestCase {
	/**
	 * @return CommandsBuilder
	 */
	protected function getCommandsBuilderMock() {
		return $this->getMock(CommandsBuilder::class);
	}
}
