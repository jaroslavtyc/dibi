<?php
namespace Pribi\Commands\Identifiers;

class IdentifiersTest extends \PHPUnit_Framework_TestCase {

	public function testCanCreateInstance() {
		$instance = new Identifiers([], $this->getMock(\Pribi\Builders\CommandsBuilder::class));
		$this->assertNotNull($instance);
	}

	public function testSubjectsCanBeReturnedAsIdentifierOneByOne() {
		$subjects = ['foo', 'bar', 'baz'];
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		foreach($subjects as $index => $subject) {
			$commandsBuilderMock->expects($this->at($index)) // index of method calling */
				->method('createIdentifier')
				->with($subjects[$index]) // expected parameter
				->willReturn($subjects[$index]); // for ease we reuse the value for later comparison
		}

		foreach($subjects as $index => $subject) {
			$commandsBuilderMock->expects($this->at($index))
				->method('createIdentifier')
				->with($subjects[$index])
				->willReturn($subjects[$index]);
		}
		/** @var $commandsBuilderMock \Pribi\Builders\CommandsBuilder */
		$identifiers = new Identifiers($subjects, $commandsBuilderMock);
		$this->assertSame($identifiers->count(), count($subjects));
		foreach ($identifiers as $index => $identifier) {
			$this->assertSame($subjects[$index], $identifier);
		}
	}
}
