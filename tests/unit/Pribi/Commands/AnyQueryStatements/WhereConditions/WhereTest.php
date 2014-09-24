<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions;

class WhereTest extends \Tests\Unit\Helpers\CommandTestCase {

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
		$commandBuilder->shouldReceive('createAnyQueryConjunction')
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
		$commandBuilder->shouldReceive('createAnyQueryDisjunction')
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
		$commandBuilder->shouldReceive('createAnyQueryAndNot')
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
		$commandBuilder->shouldReceive('createAnyQueryOrNot')
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
		$commandBuilder->shouldReceive('createAnyQueryEqualTo')
			->with($equalToIdentifier, $where)
			->andReturn($equalToDummy);
		$this->assertSame($equalToDummy, $where->equalTo($equalToSubject));
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
		$commandBuilder->shouldReceive('createAnyQueryEqualOrGreaterThen')
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
		$commandBuilder->shouldReceive('createAnyQueryEqualOrLesserThen')
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
		$commandBuilder->shouldReceive('createAnyQueryGreaterThen')
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
		$commandBuilder->shouldReceive('createAnyQueryLesserThen')
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
		$commandBuilder->shouldReceive('createAnyQueryDifferentTo')
			->with($differentToIdentifier, $where)
			->andReturn($differentToDummy);
		$this->assertSame($differentToDummy, $where->differentTo($differentToSubject));
	}

}
