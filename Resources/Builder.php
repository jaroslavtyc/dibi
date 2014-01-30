<?php
namespace Pribi\Resources;

use Pribi\Commands\Command;
use Pribi\Commands\QueryBuilder;
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
		return new QueryBuilder($command, $this->resolveExecutor(), $this->resolveTester(), $this->resolveExplainer());
	}

	private function resolveExecutor() {
		if (!isset($this->executor)) {
			$this->setExecutor(new Executor);
		}

		return $this->executor;
	}

	private function resolveTester() {
		if (!isset($this->tester)) {
			$this->setTester(new Tester);
		}

		return $this->tester;
	}

	private function resolveExplainer() {
		if (!isset($this->explainer)) {
			$this->setExplainer(new Explainer);
		}

		return $this->explainer;
	}
}
