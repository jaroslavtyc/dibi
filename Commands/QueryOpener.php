<?php
namespace Pribi\Commands;

class QueryOpener extends Command {
	public function __construct() {
		parent::__construct($this);
	}

	protected function toSql() {
		return '';
	}
}
