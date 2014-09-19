<?php
namespace Pribi\Builders\Commands;

class BuilderTest extends \Tests\Unit\Helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new Builder($this->getClosingQueriesBuilder());
		$this->assertNotNull($instance);
	}
}
