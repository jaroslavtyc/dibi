<?php
namespace Pribi\Commands\Selects\Base;

use Pribi\Commands\Identifiers\IdentifierBringer;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\Selects\Base\AfterSelecting;
use Pribi\Commands\Selects\Base\AfterSelectUsable;
use Pribi\Commands\Selects\Base\SelectIdentifiable;
use Pribi\Commands\Selects\SelectAlias;

/**
 * @method SelectAlias as ($alias)
 */
abstract class BaseSelect extends IdentifierBringer implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use \Pribi\Commands\Limits\Base\Limiting;
}
