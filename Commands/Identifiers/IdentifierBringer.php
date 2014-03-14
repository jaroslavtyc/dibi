<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Base\Aliasing;

/**
 * @method IdentifierAlias as ($alias)
 */
abstract class IdentifierBringer extends Command {
	use Aliasing;

	private $subject;

	public function __construct(Identifier $subject, Command $previousCommand) {
		$this->subject = $subject;
		parent::__construct($previousCommand);
	}

	protected function getIdentifier() {
		return $this->subject;
	}
}
