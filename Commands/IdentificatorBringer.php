<?php
namespace Pribi\Commands;
/**
 * @method IdentificatorAlias as($alias)
 */
abstract class IdentificatorBringer extends FollowingCommand {
	use Aliasing;

	private $subject;

	public function __construct($subject, Command $previousCommand = NULL) {
		$this->subject = $subject;
		parent::__construct($previousCommand);
	}

	public function getIdentificator() {
		return $this->subject;
	}
}
