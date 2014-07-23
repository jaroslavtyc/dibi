<?php
namespace Pribi\Commands\Selects\Base;

use Pribi\Commands\IdentifierBringer;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\Selects\SelectAlias;

/**
 * @method SelectAlias as ($alias)
 */
abstract class Select extends IdentifierBringer implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;
}
