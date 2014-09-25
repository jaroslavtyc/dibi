<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromAliasTest extends \tests\unit\helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new FromAlias(
			$this->createIdentifierDummy(),
			\Mockery::mock(From::class),
			$this->getCommandsBuilderDummy()
		);
		$this->assertNotNull($instance);
	}
}
