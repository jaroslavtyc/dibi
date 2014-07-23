<?php
namespace Pribi\Transactions\Ends\Base;

interface Finishable {
	public function andChain();

	public function andNoChain();

	public function release();

	public function noRelease();
}
