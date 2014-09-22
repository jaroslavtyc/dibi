<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromAliasTest extends \Tests\Unit\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new FromAlias(
			$this->createIdentifierDummy(),
			\Mockery::mock(From::class),
			$this->getCommandsBuilderDummy()
		);
		$this->assertNotNull($instance);
	}
}
