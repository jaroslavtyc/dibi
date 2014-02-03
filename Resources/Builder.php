<?php
namespace Pribi\Resources;

use Pribi\Commands\Command;
use Pribi\Commands\Executions\Executor;
use Pribi\Commands\Executions\Explainer;
use Pribi\Commands\Executions\OutputExecutor;
use Pribi\Commands\Executions\OutputExplainer;
use Pribi\Commands\Executions\OutputTester;
use Pribi\Commands\Executions\Tester;
use Pribi\Commands\Query;
use Pribi\Core\Object;

class Builder extends Object {
	private $executor;
	private $tester;
	private $explainer;

	public function setExecutor(Executor $executor) {
		$this->executor = $executor;
	}

	public function setTester(Tester $tester) {
		$this->tester = $tester;
	}

	public function setExplainer(Explainer $explainer) {
		$this->explainer = $explainer;
	}

	public function buildQuery(Command $command) {
		return new Query($command, $this->resolveExecutor(), $this->resolveTester(), $this->resolveExplainer());
	}

	private function resolveExecutor() {
		if (!isset($this->executor)) {
			$this->setExecutor(new OutputExecutor());
		}

		return $this->executor;
	}

	private function resolveTester() {
		if (!isset($this->tester)) {
			$this->setTester(new OutputTester());
		}

		return $this->tester;
	}

	private function resolveExplainer() {
		if (!isset($this->explainer)) {
			$this->setExplainer(new OutputExplainer());
		}

		return $this->explainer;
	}
}
