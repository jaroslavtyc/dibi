<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\IdentifierBringer;
use Pribi\Commands\Limits\Limitable;
use Pribi\Commands\Limits\Limiting;

/**
 * @method SelectAlias as ($alias)
 */
abstract class BaseSelect extends IdentifierBringer implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;
}
