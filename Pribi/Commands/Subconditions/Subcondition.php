<?php
namespace Pribi\Commands\Subconditions;

class Subcondition {
	public function subject($subject) {
		return new Subject($subject);
	}

	public function select($subject) {
		return new Select($subject);
	}

	public function delete($subject = FALSE) {
		return new Delete($subject);
	}

	public function startTransaction() {
		return new StartTransaction();
	}
}
