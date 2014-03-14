<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Selects\Base\BaseSelectAlias;

class SelectNotAlias extends BaseSelectAlias {
	public function __construct(Identifier $alias, SelectNot $prependSelectNot) {
		parent::__construct($alias, $prependSelectNot);
	}
}
