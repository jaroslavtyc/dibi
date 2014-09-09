<?php
namespace Pribi\Builders\ClosingQueries;

class Builder extends \Pribi\Core\Object {

	private $executor;
	private $tester;
	private $explainer;

	public function __construct(
		\Pribi\Executions\Executor $executor,
		\Pribi\Executions\Tester $tester,
		\Pribi\Executions\Explainer $explainer
	) {
		$this->executor = $executor;
		$this->tester = $tester;
		$this->explainer = $explainer;
	}

	public function buildCompleteQuery(\Pribi\Commands\Command $command) {
		return new \Pribi\Resources\CompleteQuery($command, $this->executor, $this->tester, $this->explainer);
	}

}
