<?php
namespace Pribi\Commands\Statements\Selects\Base;

use Pribi\Commands\IdentifierBringer;
use Pribi\Commands\Statements\Limits\Base\Limitable;
use Pribi\Commands\Statements\Limits\Base\Limiting;
use Pribi\Commands\Statements\Selects\SelectAlias;

/**
 * @method SelectAlias as ($alias)
 */
abstract class Select extends IdentifierBringer implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;
}
