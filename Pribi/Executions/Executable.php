<?php
namespace Pribi\Executions;

interface Executable {
	public function execute();

	public function test();

	public function explain();
}
