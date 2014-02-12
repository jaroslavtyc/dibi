<?php
namespace Pribi\Commands\Identifiers;

class NullIdentifier extends Identifier {
	public function __construct() {
		parent::__construct(NULL);
	}
}
