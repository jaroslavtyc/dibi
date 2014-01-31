<?php
namespace Pribi\Commands\Executions;

interface Executable {
	public function execute();

	public function test();

	public function explain();
}
