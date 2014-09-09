<?php
namespace Pribi\Commands\Identifiers;

class IdentifiersTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Identifiers([], $commandBuilderMock = $this->createCommandBuilderMock());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsIdentifiersDelimitedByComma() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$commandBuilderMock->expects($this->exactly(3))
			->method('createIdentifier')
			->will($this->returnValueMap([
				['foo', $fooSubjectMock = $this->getMockBuilder(\Pribi\Commands\Subjects\Subjects::class)
					->disableOriginalConstructor()
					->setMethods(['toSql'])
					->getMock()],
				['bar', $barSubjectMock = $this->getMockBuilder(\Pribi\Commands\Subjects\Subjects::class)
					->disableOriginalConstructor()
					->setMethods(['toSql'])
					->getMock()],
				['baz', $bazSubjectMock = $this->getMockBuilder(\Pribi\Commands\Subjects\Subjects::class)
					->disableOriginalConstructor()
					->setMethods(['toSql'])
					->getMock()]
			]));
		$fooSubjectMock->expects($this->once())
			->method('toSql')
			->with()
			->willReturn('foofoo');
		$barSubjectMock->expects($this->once())
			->method('toSql')
			->with()
			->willReturn('foobar');
		$bazSubjectMock->expects($this->once())
			->method('toSql')
			->with()
			->willReturn('foobaz');
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$identifiers = new Identifiers(['foo', 'bar', 'baz'], $commandBuilderMock);
		$this->assertSame(3, $identifiers->count());
		$this->assertSame(3, $identifiers->getIterator()->count());
		$toSqlMethod = new \ReflectionMethod(Identifiers::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$this->assertSame("foofoo,foobar,foobaz", $toSqlMethod->invoke($identifiers));
	}

	public function testSubjectsCanBeReturnedAsIdentifierOneByOne() {
		$subjects = ['foo', 'bar', 'baz'];
		$commandBuilderMock = $this->createCommandBuilderMock();
		foreach ($subjects as $index => $subject) {
			$commandBuilderMock->expects($this->at($index)) // index of method calling */
				->method('createIdentifier')
				->with($subjects[$index]) // expected parameter
				->willReturn($subjects[$index]); // for ease we reuse the value for later comparison
		}

		foreach ($subjects as $index => $subject) {
			$commandBuilderMock->expects($this->at($index))
				->method('createIdentifier')
				->with($subjects[$index])
				->willReturn($subjects[$index]);
		}
		/** @var $commandBuilderMock \Pribi\Builders\Commands\Builder */
		$identifiers = new Identifiers($subjects, $commandBuilderMock);
		$this->assertSame($identifiers->count(), count($subjects));
		foreach ($identifiers as $index => $identifier) {
			$this->assertSame($subjects[$index], $identifier);
		}
	}
}
