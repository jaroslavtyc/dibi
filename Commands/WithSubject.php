<?php
namespace Pribi\Commands;

use Pribi\Commands\Identifiers\Subject;

abstract class WithSubject extends Command {
	private $subject;

	public function __construct(Subject $subject, Command $previousCommand) {
		$this->subject = $subject;
		parent::__construct($previousCommand);
	}

	protected function getSubject() {
		return $this->subject;
	}
}
