<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\Identifier;

class SelectAlias extends Base\SelectAlias {
	public function __construct(Identifier $alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
	}
}