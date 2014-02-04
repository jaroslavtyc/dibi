<?php
namespace Pribi\Resources;

use Pribi\Commands\Command,
	Pribi\Executions\Executable,
	Pribi\Executions\Executor,
	Pribi\Executions\Explainer,
	Pribi\Executions\Tester;

class Query extends Command implements Executable {
	private $lastCommand;
	private $executor;
	private $tester;
	private $explainer;

	public function __construct(Command $lastCommand, Executor $executor, Tester $tester, Explainer $explainer) {
		$this->lastCommand = $lastCommand;
		$this->executor = $lastCommand;
		$this->tester = $tester;
		$this->explainer = $explainer;
	}

	public function toSql() {
		$command = $this->lastCommand;
		$query = $command->toSql();
		while ($command->hasPreviousCommand()) {
			$command = $command->getPreviousCommand();
			$query = $command->toSql() . $query;
		}

		return $query;
	}

	/**
	 * @return Result
	 */
	public function execute() {
		return $this->executor->execute($this->toSql());
	}

	/**
	 * @return Result
	 */
	public function test() {
		return $this->tester->test($this->toSql());
	}

	/**
	 * @return Result
	 */
	public function explain() {
		return $this->explainer->explain($this->toSql());
	}
}
