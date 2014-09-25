<?php
namespace Pribi\Builders\Commands;

class BuilderTest extends \tests\unit\helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new Builder($this->getClosingQueriesBuilder());
		$this->assertNotNull($instance);
	}
}
