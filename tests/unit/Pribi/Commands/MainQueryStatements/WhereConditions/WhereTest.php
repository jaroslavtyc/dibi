<?php
namespace Pribi\Commands\MainQueryStatements\WhereConditions;

class WhereTest extends \tests\unit\helpers\StatementTestCase {

	public function testNoFollowingStatementIsMissingOrExcessive() {
		$this->huntUnexpectedFollowingStatements();
	}

	public function testCanCreateInstance() {
		$instance = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testCanBeFollowedByAnd() {
		$subject = 'foo';
		$andIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($subject)
			->andReturn($andIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$conjunctionDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryConjunction')
			->with($andIdentifier, $where)
			->andReturn($conjunctionDummy);
		$this->assertSame($conjunctionDummy, $where->and($subject));
	}

	public function testCanBeFollowedByOr() {
		$orSubject = 'foo';
		$orIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($orSubject)
			->andReturn($orIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$disjunctionDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryDisjunction')
			->with($orIdentifier, $where)
			->andReturn($disjunctionDummy);
		$this->assertSame($disjunctionDummy, $where->or($orSubject));
	}

	public function testCanBeFollowedByAndNot() {
		$andNotSubject = 'foo';
		$orIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($andNotSubject)
			->andReturn($orIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$andNotDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryAndNot')
			->with($orIdentifier, $where)
			->andReturn($andNotDummy);
		$this->assertSame($andNotDummy, $where->andNot($andNotSubject));
	}

	public function testCanBeFollowedByOrNot() {
		$orNotSubject = 'foo';
		$orNotIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($orNotSubject)
			->andReturn($orNotIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$orNotDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryOrNot')
			->with($orNotIdentifier, $where)
			->andReturn($orNotDummy);
		$this->assertSame($orNotDummy, $where->orNot($orNotSubject));
	}

	public function testCanBeFollowedByEqualTo() {
		$equalToSubject = 'foo';
		$equalToIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($equalToSubject)
			->andReturn($equalToIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$equalToDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryEqualTo')
			->with($equalToIdentifier, $where)
			->andReturn($equalToDummy);
		$this->assertSame($equalToDummy, $where->equalTo($equalToSubject));
	}

	public function testCanBeFollowedByNotEqualTo() {
		$notEqualToSubject = 'foo';
		$notEqualToIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($notEqualToSubject)
			->andReturn($notEqualToIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$notEqualToDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryNotEqualTo')
			->with($notEqualToIdentifier, $where)
			->andReturn($notEqualToDummy);
		$this->assertSame($notEqualToDummy, $where->notEqualTo($notEqualToSubject));
	}

	public function testCanBeFollowedByEqualOrGreaterThen() {
		$equalOrGreaterThenSubject = 'foo';
		$equalOrGreaterThenIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($equalOrGreaterThenSubject)
			->andReturn($equalOrGreaterThenIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$equalOrGreaterThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryEqualOrGreaterThen')
			->with($equalOrGreaterThenIdentifier, $where)
			->andReturn($equalOrGreaterThenDummy);
		$this->assertSame($equalOrGreaterThenDummy, $where->equalOrGreaterThen($equalOrGreaterThenSubject));
	}

	public function testCanBeFollowedByEqualOrLesserThen() {
		$equalOrLesserThenSubject = 'foo';
		$equalOrLesserThenIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($equalOrLesserThenSubject)
			->andReturn($equalOrLesserThenIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$equalOrLesserThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryEqualOrLesserThen')
			->with($equalOrLesserThenIdentifier, $where)
			->andReturn($equalOrLesserThenDummy);
		$this->assertSame($equalOrLesserThenDummy, $where->equalOrLesserThen($equalOrLesserThenSubject));
	}

	public function testCanBeFollowedByGreaterThen() {
		$greaterThenSubject = 'foo';
		$greaterThenIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($greaterThenSubject)
			->andReturn($greaterThenIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$greaterThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryGreaterThen')
			->with($greaterThenIdentifier, $where)
			->andReturn($greaterThenDummy);
		$this->assertSame($greaterThenDummy, $where->greaterThen($greaterThenSubject));
	}

	public function testCanBeFollowedByLesserThen() {
		$lesserThenSubject = 'foo';
		$lesserThenIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($lesserThenSubject)
			->andReturn($lesserThenIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$lesserThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryLesserThen')
			->with($lesserThenIdentifier, $where)
			->andReturn($lesserThenDummy);
		$this->assertSame($lesserThenDummy, $where->lesserThen($lesserThenSubject));
	}

	public function testCanBeFollowedByDifferentTo() {
		$differentToSubject = 'foo';
		$differentToIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($differentToSubject)
			->andReturn($differentToIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$differentToDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryDifferentTo')
			->with($differentToIdentifier, $where)
			->andReturn($differentToDummy);
		$this->assertSame($differentToDummy, $where->differentTo($differentToSubject));
	}

	public function testCanBeFollowedByLimitWithoutOffset() {
		$limitValue = 'foo';
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$limitDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryLimit')
			->with(0, $limitValue, $where)
			->andReturn($limitDummy);
		$this->assertSame($limitDummy, $where->limit($limitValue));
	}

	public function testCanBeFollowedByOffsetAndLimit() {
		$offsetValue = 'foo';
		$limitValue = 'baz';
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$limitDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createMainQueryLimit')
			->with($offsetValue, $limitValue, $where)
			->andReturn($limitDummy);
		$this->assertSame($limitDummy, $where->offsetAndLimit($offsetValue, $limitValue));
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
