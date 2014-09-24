<?php
namespace Pribi\Commands\AnyQueryStatements\Selects\Base;

use Pribi\Commands\IdentifierBringer;
use Pribi\Commands\AnyQueryStatements\Limits\Parts\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Parts\Limiting;
use Pribi\Commands\AnyQueryStatements\Selects\SelectAlias;

/**
 * @method SelectAlias as ($alias)
 */
abstract class Select extends IdentifierBringer implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;
}
