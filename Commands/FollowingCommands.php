<?php
namespace Pribi\Commands;
/**
 * @method as($alias)
 */
class FollowingCommands extends \Pribi\Core\Object {
	use Alias;

	private $commands;
	private $lastCommandWithIdentificator;

	protected function __construct(Commands $commands) {
		$this->commands = $commands;
	}

	public function select($identificator) {
		return $this->createCommandWithIdentificator('select', $identificator);
	}

	public function from($identificator) {
		return new From($identificator, $this->getCommands());
	}

	public function innerJoin($identificator) {
		return new InnerJoin($identificator, $this->getCommands());
	}

	public function leftJoin($identificator) {
		return new LeftJoin($identificator, $this->getCommands());
	}

	public function rightJoin($identificator) {
		return new RightJoin($identificator, $this->getCommands());
	}

	public function on($identificator) {
		return new On($identificator, $this->getCommands());
	}

	public function where($identificator) {
		return new Where($identificator, $this->getCommands());
	}

	public function limit($limit) {
		return new Limit(0, $limit);
	}

	public function offsetAndLimit($offset, $limit) {
		return new Limit($offset, $limit);
	}

	public function alias($name) {
		$this->getLastCommandWithIdentificator()->setAlias($name);
	}

	/**
	 * @return CommandWithIdentificator
	 */
	private function createCommandWithIdentificator($name, $identificator) {
		if ($name === 'select') {
			$command = new Select($identificator, $this);
		} else {
			throw new UnknownCommand($name);
		}

		$this->setLastCommandWithIdentificator($command);

		return $command;
	}

	private function setLastCommandWithIdentificator(CommandWithIdentificator $command) {
		$this->lastCommandWithIdentificator = $command;
	}

	/**
	 * @return CommandWithIdentificator
	 */
	private function getLastCommandWithIdentificator() {
		return $this->lastCommandWithIdentificator;
	}

	/**
	 * @return Commands
	 */
	protected function getCommands() {
		return $this->commands;
	}
}