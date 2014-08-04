<?php
namespace Pribi\Commands\Identifiers;

class IdentifierTest extends \PHPUnit_Framework_TestCase {

	private $accessibleIdentifierToSqlMethod;

	protected function setUp() {
		$this->accessibleIdentifierToSqlMethod = $toSqlMethod = new \ReflectionMethod(Identifier::class, 'toSql');
		$this->accessibleIdentifierToSqlMethod->setAccessible(TRUE);
	}

	public function testInstanceCanBeCreated() {
		$instance = new Identifier('foo');
		$this->assertNotNull($instance);
	}

	public function testWithEmptyStringAsSubjectIsEmptyStringAsSql() {
		$toSqlMethod = new \ReflectionMethod(Identifier::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$this->assertSame('', $this->getAsIdentifierTurnedToSql(''));
	}

	private function getAsIdentifierTurnedToSql($subject) {
		return $this->accessibleIdentifierToSqlMethod->invoke(new Identifier($subject));
	}

	public function testWithPositiveIntegerAsSubjectIsSameDigitsAsSql() {
		$number = 123456789;
		$this->assertSame($number, $this->getAsIdentifierTurnedToSql($number));
	}

	public function testWithNegativeIntegerAsSubjectIsSameDigitsAsSql() {
		$number = -987654321;
		$this->assertSame($number, $this->getAsIdentifierTurnedToSql($number));
	}

	public function testWithPositiveFloatAsSubjectIsSameFloatAsSql() {
		$number = 123456.789;
		$this->assertSame($number, $this->getAsIdentifierTurnedToSql($number));
	}

	public function testWithNegativeFloatAsSubjectIsSameFloatAsSql() {
		$number = -987654.321;
		$this->assertSame($number, $this->getAsIdentifierTurnedToSql($number));
	}

	public function testWordIsQuotedAsSql() {
		$word = 'foo';
		$this->assertSame("`$word`", $this->getAsIdentifierTurnedToSql($word));
	}

	public function testWordsWithSpacesDelimiterAreQuotedAsSingleIdentifierAsSql() {
		$moreWords = 'foo bar';
		$this->assertSame("`$moreWords`", $this->getAsIdentifierTurnedToSql($moreWords));
	}

	public function testDigitsWithEvenSingleCharacterAreQuotedAsSql() {
		$almostNumber = '987654321f';
		$this->assertSame("`$almostNumber`", $this->getAsIdentifierTurnedToSql($almostNumber));
	}

	public function testNullValueIsUnquotedTextWithNullWordAsSql() {
		$this->assertSame('NULL', $this->getAsIdentifierTurnedToSql(NULL));
	}

	public function testStarAsWildcardCharacterIsNotQuotedAsSql() {
		$this->assertSame('*', $this->getAsIdentifierTurnedToSql('*'));
	}

	public function testIdentifierFromMoreQuantifiersHasEachOfThemQuotedAsSql() {
		$firstQualifier = 'foo';
		$lastQualifier = 'bar';
		$subject = "$firstQualifier.$lastQualifier"; // as table_name.ColumnName for example
		$this->assertSame("`$firstQualifier`.`$lastQualifier`", $this->getAsIdentifierTurnedToSql($subject));
	}

	public function testStarAsWildcardAsOneOfQuantifiersOfIdentifierIsNotQuotedAsSql() {
		$firstQuantifier = 'foo';
		$middleQuantifier = 'bar';
		$lastQuantifier = '*';
		$subject = "$firstQuantifier.$middleQuantifier.$lastQuantifier"; // as database_name.table_name.* for example
		$this->assertSame("`$firstQuantifier`.`$middleQuantifier`.$lastQuantifier", $this->getAsIdentifierTurnedToSql($subject));
	}

	public function testSqlFunctionNameRecognizedByBracketIsNotQuotedAsSql() {
		$function = 'FOO(bar)';
		$this->assertSame($function, $this->getAsIdentifierTurnedToSql($function));
	}

	public function testAlreadyQuotedSubjectIsNotQuotedAgainAsSql() {
		$subject = '`foo`.`bar`.`baz`';
		$this->assertSame($subject, $this->getAsIdentifierTurnedToSql($subject));
	}
}
