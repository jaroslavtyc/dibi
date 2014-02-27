<?php
namespace Pribi\Commands\Conditions;

/**
 * @method \Pribi\Commands\Command and($identificator)
 * @method \Pribi\Commands\Command or($identificator)
 */
interface AndOrUsable {
	public function andNot($subject);

	public function orNot($subject);
}
