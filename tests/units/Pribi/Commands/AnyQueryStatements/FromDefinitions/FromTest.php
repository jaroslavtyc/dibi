<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromTest extends \Tests\Helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsFromKeywordFollowedByTableName() {
		$toSqlMethod = new \ReflectionMethod(From::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$tableIdentifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$tableName = 'foo';
		$tableIdentifier->expects($this->once())
			->method('toSql')
			->willReturn($tableName);
		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifier */
		$highPriority = new From($tableIdentifier, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertSame("FROM $tableName", $toSqlMethod->invoke($highPriority));
	}

	public function testCallingAliasWillPropagateAliasNameAndReturnAliasObject() {
		$toSqlMethod = new \ReflectionMethod(From::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$tableIdentifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->getMock();
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifier */
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($tableIdentifier, $this->createCommandDummy(), $commandBuilder);
		$aliasName = 'bar';
		$aliasIdentifier = $this->createIdentifierDummy();
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($aliasName)
			->willReturn($aliasIdentifier);
		$aliasDummy = 'baz';
		$commandBuilder->expects($this->once())
			->method('createAnyQueryFromAlias')
			->with($aliasIdentifier, $from)
			->willReturn($aliasDummy);
		$this->assertSame($aliasDummy, $from->as('bar'));
	}
}
