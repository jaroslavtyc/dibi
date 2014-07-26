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
		$this->assertSame('', $this->getASIdentifierTurnedToSql(''));
	}

	private function getASIdentifierTurnedToSql($subject) {
		return $this->accessibleIdentifierToSqlMethod->invoke(new Identifier($subject));
	}

	public function testWithPositiveIntegerAsSubjectIsSameDigitsAsSql() {
		$number = 123456789;
		$this->assertSame($number, $this->getASIdentifierTurnedToSql($number));
	}

	public function testWithNegativeIntegerAsSubjectIsSameDigitsAsSql() {
		$number = -987654321;
		$this->assertSame($number, $this->getASIdentifierTurnedToSql($number));
	}

	public function testWithPositiveFloatAsSubjectIsSameFloatAsSql() {
		$number = 123456.789;
		$this->assertSame($number, $this->getASIdentifierTurnedToSql($number));
	}

	public function testWithNegativeFloatAsSubjectIsSameFloatAsSql() {
		$number = -987654.321;
		$this->assertSame($number, $this->getASIdentifierTurnedToSql($number));
	}

	public function testWordIsQuotedAsSql() {
		$word = 'foo';
		$this->assertSame("`$word`", $this->getASIdentifierTurnedToSql($word));
	}

	public function testWordsWithSpacesDelimiterAreQuotedAsSingleIdentifierAsSql() {
		$moreWords = 'foo bar';
		$this->assertSame("`$moreWords`", $this->getASIdentifierTurnedToSql($moreWords));
	}

	public function testDigitsWithEvenSingleCharacterAreQuotedAsSql() {
		$almostNumber = '987654321f';
		$this->assertSame("`$almostNumber`", $this->getASIdentifierTurnedToSql($almostNumber));
	}

	public function testNullValueIsUnquotedTextWithNullWordAsSql() {
		$this->assertSame('NULL', $this->getASIdentifierTurnedToSql(NULL));
	}

	public function testStarAsWildcardCharacterIsNotQuotedAsSql() {
		$this->assertSame('*', $this->getASIdentifierTurnedToSql('*'));
	}

	public function testIdentifierFromMoreQuantifiersHasEachOfThemQuotedAsSql() {
		$firstQualifier = 'foo';
		$lastQualifier = 'bar';
		$subject = "$firstQualifier.$lastQualifier"; // as table_name.ColumnName for example
		$this->assertSame("`$firstQualifier`.`$lastQualifier`", $this->getASIdentifierTurnedToSql($subject));
	}

	public function testStarAsWildcardAsOneOfQuantifiersOfIdentifierIsNotQuotedAsSql() {
		$firstQuantifier = 'foo';
		$middleQuantifier = 'bar';
		$lastQuantifier = '*';
		$subject = "$firstQuantifier.$middleQuantifier.$lastQuantifier"; // as database_name.table_name.* for example
		$this->assertSame("`$firstQuantifier`.`$middleQuantifier`.$lastQuantifier", $this->getASIdentifierTurnedToSql($subject));
	}

	public function testSqlFunctionNameRecognizedByBracketIsNotQuotedAsSql() {
		$function = 'FOO(bar)';
		$this->assertSame($function, $this->getASIdentifierTurnedToSql($function));
	}

	public function testAlreadyQuotedSubjectIsNotQuotedAgainAsSql() {
		$subject = '`foo`.`bar`.`baz`';
		$this->assertSame($subject, $this->getASIdentifierTurnedToSql($subject));
	}
}
