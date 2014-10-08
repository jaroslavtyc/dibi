<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions;

class WhereTest extends \tests\unit\Pribi\Commands\AnyQueryStatements\WhereConditions\WhereTestBase {

	protected function getWhereClassName() {
		return Where::class;
	}

	protected function getWhereNamespacePrefix() {
		return 'Any';
	}
}
