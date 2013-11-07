<?php
namespace Pribi\Commands;

interface Executable {
	public function execute();

	public function test();

	public function explain();
}
