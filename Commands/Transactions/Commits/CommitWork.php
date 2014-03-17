<?php
namespace Pribi\Commands\Transactions\Commits;

class CommitWork extends Commit {
	protected function toSql() {
		return 'COMMIT WORK';
	}
}
