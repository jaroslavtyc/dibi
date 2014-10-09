<?php
namespace Pribi\Commands\MainQueryStatements\WhereConditions;

class WhereTest extends \tests\unit\Pribi\Commands\AnyQueryStatements\WhereConditions\WhereTestHelper {

	protected function getWhereClassName() {
		return Where::class;
	}

	protected function getWhereNamespacePrefix() {
		return 'Main';
	}

	public function testQueryCanBeExecuted() {
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Mockery\MockInterface $commandBuilder */
		$completeQuery = \Mockery::mock(\Pribi\Resources\CompleteQuery::class);
		$resultDummy = 'foo';
		$completeQuery->shouldReceive('execute')
			->withNoArgs()
			->andReturn($resultDummy);
		$commandBuilder->shouldReceive('createCompleteQuery')
			->with($where)
			->andReturn($completeQuery);
		$this->assertSame($resultDummy, $where->execute());
	}

	public function testQueryCanBeTested() {
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Mockery\MockInterface $commandBuilder */
		$completeQuery = \Mockery::mock(\Pribi\Resources\CompleteQuery::class);
		$resultDummy = 'foo';
		$completeQuery->shouldReceive('test')
			->withNoArgs()
			->andReturn($resultDummy);
		$commandBuilder->shouldReceive('createCompleteQuery')
			->with($where)
			->andReturn($completeQuery);
		$this->assertSame($resultDummy, $where->test());
	}

	public function testQueryCanBeExplained() {
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Mockery\MockInterface $commandBuilder */
		$completeQuery = \Mockery::mock(\Pribi\Resources\CompleteQuery::class);
		$resultDummy = 'foo';
		$completeQuery->shouldReceive('explain')
			->withNoArgs()
			->andReturn($resultDummy);
		$commandBuilder->shouldReceive('createCompleteQuery')
			->with($where)
			->andReturn($completeQuery);
		$this->assertSame($resultDummy, $where->explain());
	}

}
