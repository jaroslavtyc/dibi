<?php
namespace Pribi\Executions;

/**
 * For \Pribi\Commands\Command only
 * @see \Pribi\Commands\Command
 */
trait Executabling {

	private $builder;

	public function execute() {
		return $this->createCompleteQuery()->execute();
	}

	public function test() {
		return $this->createCompleteQuery()->test();
	}

	public function explain() {
		return $this->createCompleteQuery()->explain();
	}

	/**
	 * @return \Pribi\Resources\CompleteQuery
	 */
	protected function createCompleteQuery() {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createCompleteQuery($this);
	}
}
