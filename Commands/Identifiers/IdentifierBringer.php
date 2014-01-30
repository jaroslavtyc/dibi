<?php
namespace Pribi\Commands;

use Pribi\Commands\Identifiers\Identifier;

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

	public function getIdentifier() {
		return $this->subject;
	}
}
