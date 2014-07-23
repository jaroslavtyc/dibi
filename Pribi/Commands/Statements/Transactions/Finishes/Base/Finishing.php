<?php
namespace Pribi\Transactions\Ends\Base;

use Pribi\Commands\Transactions\Finishes\AndChain;
use Pribi\Commands\Transactions\Finishes\AndNoChain;
use Pribi\Commands\Transactions\Finishes\NoRelease;
use Pribi\Commands\Transactions\Finishes\Release;

trait Finishing {
	public function andChain() {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$andChain = new AndChain($this);

		return $andChain;
	}

	public function andNoChain() {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$noChain = new AndNoChain($this);

		return $noChain;
	}

	public function release() {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$release = new Release($this);

		return $release;
	}

	public function noRelease() {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$noRelease = new NoRelease($this);

		return $noRelease;
	}
}
