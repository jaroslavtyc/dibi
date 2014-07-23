<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Commits;

class CommitWork extends Commit {
	protected function toSql() {
		return parent::toSql() . ' WORK';
	}
}
