<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromAliasTest extends \tests\unit\Pribi\Commands\AnyQueryStatements\FromDefinitions\FromBaseTestHelper {

	public function testCanCreateInstance() {
		$instance = new $this->testedClassName(
			$this->createIdentifierDummy(),
			\Mockery::mock(preg_replace('~Alias$~', '', $this->testedClassName)),
			$this->getCommandsBuilderDummy()
		);
		$this->assertNotNull($instance);
	}

	protected function createPrependCommandDummy() {
		return \Mockery::mock(\Pribi\Commands\AnyQueryStatements\FromDefinitions\From::class);
	}

	public function testAsSqlIsExpectedKeywordFollowedByTableName() {
		$toSqlMethod = new \ReflectionMethod($this->testedClassName, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$aliasIdentifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$tableName = 'foo';
		$aliasIdentifier->expects($this->once())
			->method('toSql')
			->willReturn($tableName);
		/** @var \Pribi\Commands\Identifiers\Identifier $aliasIdentifier */
		$fromAlias = new $this->testedClassName($aliasIdentifier, $this->createPrependCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertSame("AS $tableName", $toSqlMethod->invoke($fromAlias));
	}

}
