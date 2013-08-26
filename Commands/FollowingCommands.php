<?php
namespace Pribi\Commands;
/**
 * @method as($alias) @return Command
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
		return $this->createCommandWithIdentificator('from', $identificator);
	}

	public function innerJoin($identificator) {
		return $this->createCommandWithIdentificator('innerJoin', $identificator);
	}

	public function leftJoin($identificator) {
		return $this->createCommandWithIdentificator('leftJoin', $identificator);
	}

	public function rightJoin($identificator) {
		return $this->createCommandWithIdentificator('rightJoin', $identificator);
	}

	public function on($identificator) {
		return $this->createCommandWithIdentificator('on', $identificator);
	}

	public function where($identificator) {
		return $this->createCommandWithIdentificator('where', $identificator);
	}

	public function limit($limit) {
		return new Limit(0, $limit);
	}

	public function offsetAndLimit($offset, $limit) {
		return new Limit($offset, $limit);
	}

	/**
	 * @return CommandWithIdentificator
	 */
	protected function alias($name) {
		$this->getLastCommandWithIdentificator()->setAlias($name);

		return $this->getLastCommandWithIdentificator();
	}

	/**
	 * @return CommandWithIdentificator
	 */
	private function createCommandWithIdentificator($name, $identificator) {
		if ($name === 'select') {
			$command = new Select($identificator, $this);
		} elseif ($name === 'from') {
			$command = new From($identificator, $this);
		} elseif ($name === 'innerJoin') {
			$command = new InnerJoin($identificator, $this);
		} elseif ($name === 'leftJoin') {
			$command = new LeftJoin($identificator, $this);
		} elseif ($name === 'rightJoin') {
			$command = new RightJoin($identificator, $this);
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