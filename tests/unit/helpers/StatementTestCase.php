<?php
namespace tests\unit\helpers;

class StatementTestCase extends CommandTestCase {

	protected function huntUnexpectedFollowingStatements(){
		$hunter = new \tests\unit\helpers\HunterOfUnexpectedFollowingStatement(new ExpectedStatementsFinder, new AvailableStatementsFinder());
		$hunter->hunt(preg_replace('~Test$~', '', static::class));
	}

}
 