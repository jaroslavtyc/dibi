<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\Identifier;

class SelectNotAlias extends Base\SelectAlias {
	public function __construct(Identifier $alias, SelectNot $prependSelectNot) {
		parent::__construct($alias, $prependSelectNot);
	}
}
