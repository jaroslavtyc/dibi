<?php
namespace Pribi\Commands\Conditions\Base;

use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\Identifiers;

abstract class In extends Command implements AndOrUsable {
	use AndOring;

	/**
	 * @var Identifier[] Identifiers
	 */
	private $identifiers;

	public function __construct(Identifiers $identifiers, Command $previousCommand) {
		$this->identifiers = $this->sanitizeIdentifiersAmount($identifiers);
		parent::__construct($previousCommand);
	}

	private function sanitizeIdentifiersAmount(Identifiers $identifiers) {
		if (count($identifiers) === 0) {
			$identifiers = new Identifiers(NULL);
		}
		return $identifiers;
	}
}