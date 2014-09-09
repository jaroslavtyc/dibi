<?php
namespace Pribi\Executions;

use Pribi\Builders\ClosingQueries\Builder;
use Pribi\Commands\Command;
use Pribi\Resources\Query;

trait Executabling {
	private $builder;

	public function execute() {
		return $this->createQuery()->execute();
	}

	public function test() {
		return $this->createQuery()->test();
	}

	public function explain() {
		return $this->createQuery()->explain();
	}

	/**
	 * @return Query
	 */
	protected function createQuery() {
		return $this->getCommandBuilder()->createQuery($this);
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
