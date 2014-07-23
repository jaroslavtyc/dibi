<?php
namespace Pribi\Executions;

use Pribi\Resources\Builder;
use Pribi\Commands\Command;
use Pribi\Resources\Query;

trait Executabling {
	private $builder;

	public function execute() {
		return $this->builtQuery()->execute();
	}

	public function test() {
		return $this->builtQuery()->test();
	}

	public function explain() {
		return $this->builtQuery()->explain();
	}

	/**
	 * @return Query
	 */
	protected function builtQuery() {
		return $this->buildQueryByBuilder($this->resolveBuilder());
	}

	private function buildQueryByBuilder(Builder $builder) {
		/**
		 * @var Command $this
		 */
		return $builder->buildQuery($this);
	}

	/**
	 * @return Builder
	 */
	protected function resolveBuilder() {
		if (!isset($this->builder)) {
			$this->builder = $this->createBuilder();
		}

		return $this->builder;
	}

	/**
	 * @return Builder
	 */
	private function createBuilder() {
		return new Builder;
	}
}
