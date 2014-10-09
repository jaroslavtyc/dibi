<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions;

class WhereTest extends \tests\unit\Pribi\Commands\AnyQueryStatements\WhereConditions\WhereTestHelper {

	protected function getWhereClassName() {
		return Where::class;
	}

	protected function getWhereNamespacePrefix() {
		return 'Any';
	}
}
