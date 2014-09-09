<?php
namespace Pribi\Resources;

class CompleteQuery extends \Pribi\Commands\Command implements \Pribi\Executions\Executable {

	private $lastCommand;
	private $executor;
	private $tester;
	private $explainer;

	public function __construct(
		\Pribi\Commands\Command $lastCommand,
		\Pribi\Executions\Executor $executor,
		\Pribi\Executions\Tester $tester,
		\Pribi\Executions\Explainer $explainer
	) {
		$this->lastCommand = $lastCommand;
		$this->executor = $executor;
		$this->tester = $tester;
		$this->explainer = $explainer;
	}

	public function toSql() {
		$sql = $this->lastCommand->toSql();
		$command = $this->lastCommand;
		while ($command->hasPreviousCommand()) {
			$command = $command->getPreviousCommand();
			$previousQueryPart = $command->toSql();
			if ($previousQueryPart !== '') {
				$sql = $previousQueryPart . ' ' . $sql;
			}
		}

		return $sql;
	}

	/**
	 * @return \Pribi\Responses\Result
	 */
	public function execute() {
		return $this->executor->execute($this->toSql());
	}

	public function test() {
		return $this->tester->test($this->toSql());
	}

	public function explain() {
		return $this->explainer->explain($this->toSql());
	}
}
