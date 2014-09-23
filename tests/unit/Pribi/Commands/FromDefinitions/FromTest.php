<?php
namespace Pribi\Commands\FromDefinitions;

use Pribi\Builders\Commands\Builder;
use Pribi\Commands\AnyQueryStatements\FromDefinitions\From;
use Pribi\Commands\Identifiers\Identifier;

class FromTest extends \Tests\Unit\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsFromKeywordWithTableName() {
		$tableName = 'foo';
		$tableIdentifier = \Mockery::mock(Identifier::class);
		$tableIdentifier->shouldAllowMockingProtectedMethods();
		$tableIdentifier->shouldReceive('toSql')
			->once()
			->withNoArgs()
			->andReturn("$tableName");
		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifier */
		$from = new From($tableIdentifier, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$toSqlMethod = new \ReflectionMethod(From::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$this->assertSame("FROM $tableName", $toSqlMethod->invoke($from));
	}

	public function testTableNameCanBeAliased() {
		$aliasIdentifier = $this->createIdentifierDummy();
		$aliasName = 'bar';
		$commandBuilder = \Mockery::mock(Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->once()
			->with($aliasName)
			->andReturn($aliasIdentifier);
		/** @var Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$aliasDummy = 'foo';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createAnyQueryFromAlias')
			->once()
			->with($aliasIdentifier, $from)
			->andReturn($aliasDummy);
		$this->assertSame($aliasDummy, $from->as($aliasName));
	}
}
