<?php
// namespace hsa to follow directory structure to allow autoloading by PSR-0 standard
namespace tests\unit\Pribi\Commands\AnyQueryStatements\WhereConditions;

abstract class WhereTestHelper extends \tests\unit\helpers\StatementTestCase {

	private $whereClassName;
	private $whereNamespacePrefix;

	protected function setUp() {
		parent::setUp();
		$this->whereClassName = $this->getWhereClassName();
		$this->whereNamespacePrefix = $this->getWhereNamespacePrefix();
	}

	abstract protected function getWhereClassName();
	
	abstract protected function getWhereNamespacePrefix();

	public function testNoFollowingStatementIsMissingOrExcessive() {
		$this->huntUnexpectedFollowingStatements();
	}

	public function testCanCreateInstance() {
		$instance = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$conjunctionDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryConjunction')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$disjunctionDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryDisjunction')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$andNotDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryAndNot')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$orNotDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryOrNot')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$equalToDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryEqualTo')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$equalOrGreaterThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryEqualOrGreaterThen')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$equalOrLesserThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryEqualOrLesserThen')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$greaterThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryGreaterThen')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$lesserThenDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryLesserThen')
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
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$differentToDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryDifferentTo')
			->with($differentToIdentifier, $where)
			->andReturn($differentToDummy);
		$this->assertSame($differentToDummy, $where->differentTo($differentToSubject));
	}

	public function testCanBeFollowedByNotEqualTo() {
		$notEqualToSubject = 'foo';
		$notEqualToIdentifier = $this->createIdentifierDummy();
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$commandBuilder->shouldReceive('createIdentifier')
			->with($notEqualToSubject)
			->andReturn($notEqualToIdentifier);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$notEqualToDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryNotEqualTo')
			->with($notEqualToIdentifier, $where)
			->andReturn($notEqualToDummy);
		$this->assertSame($notEqualToDummy, $where->notEqualTo($notEqualToSubject));
	}

	public function testCanBeFollowedByLimitWithoutOffset() {
		$limitValue = 'foo';
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$limitDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryLimit')
			->with(0, $limitValue, $where)
			->andReturn($limitDummy);
		$this->assertSame($limitDummy, $where->limit($limitValue));
	}

	public function testCanBeFollowedByOffsetAndLimit() {
		$offsetValue = 'foo';
		$limitValue = 'baz';
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$where = new $this->whereClassName($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Pribi\Commands\AnyQueryStatements\WhereConditions\Where $where */
		$limitDummy = 'bar';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('create' . $this->whereNamespacePrefix . 'QueryLimit')
			->with($offsetValue, $limitValue, $where)
			->andReturn($limitDummy);
		$this->assertSame($limitDummy, $where->offsetAndLimit($offsetValue, $limitValue));
	}

}
