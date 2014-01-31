<?php
namespace Pribi\Commands\Executions;

use Pribi\Resources\Builder;

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
		return $this->resolveBuilder()->buildQuery($this);
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
	protected function createBuilder() {
		return new Builder;
	}
}
