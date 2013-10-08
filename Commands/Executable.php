<?php
namespace Pribi\Commands;

interface Executable extends Command {
	public function execute();

	public function test();

	public function explain();
}
