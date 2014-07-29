<?php
namespace Pribi\Commands\Subjects;

class Subject extends \Pribi\Commands\QueryPart {

	private $subjectValue;

	public function __construct($subjectValue) {
		$this->subjectValue = $subjectValue;
	}

	protected function toSql() {
		return $this->subjectValue;
	}
}
 