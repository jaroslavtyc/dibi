<?php
namespace Pribi\Commands;

/**
 * @method as ($alias) @return Command
 */
class FollowingCommands extends \Pribi\Core\Object {
	use Alias;

	private $commands;
	private $lastCommandWithIdentificator;
	private $lastCommand;

	protected function __construct(Commands $commands) {
		$this->commands = $commands;
	}

	public function select($identificator) {
		$select = new Select($identificator, $this);
		$this->setLastCommandWithIdentificator($select);

		return $select;
	}

	public function from($identificator) {
		$from = new From($identificator, $this);
		$this->setLastCommandWithIdentificator($from);

		return $from;
	}

	public function innerJoin($identificator) {
		$innerJoin = new InnerJoin($identificator, $this);
		$this->setLastCommandWithIdentificator($innerJoin);

		return $innerJoin;
	}

	public function leftJoin($identificator) {
		$leftJoin = new LeftJoin($identificator, $this);
		$this->setLastCommandWithIdentificator($leftJoin);

		return $leftJoin;
	}

	public function rightJoin($identificator) {
		$rightJoin = new RightJoin($identificator, $this);
		$this->setLastCommandWithIdentificator($rightJoin);

		return $rightJoin;
	}

	public function on($identificator) {
		$on = new On($identificator, $this);
		$this->setLastCommandWithIdentificator($on);

		return $on;
	}

	public function where($identificator) {
		$where = new Where($identificator, $this);
		$this->setLastCommandWithIdentificator($where);

		return $where;
	}

	public function limit($limit) {
		return new Limit(0, $limit);
	}

	public function offsetAndLimit($offset, $limit) {
		return new Limit($offset, $limit);
	}

	/**
	 * @return CommandBringingIdentificator
	 */
	protected function alias($name) {
		if ($this->getLastCommandWithIdentificator() === $this->getLastCommand()) {
			$this->getLastCommandWithIdentificator()->setAlias($name);
		} else {
			throw new Exceptions\AliasHasToDirectlyFollowIdentificator(sprintf('Followed [%s]', \get_class($this->getLastCommand())));
		}

		return $this->getLastCommandWithIdentificator();
	}

	private function setLastCommandWithIdentificator(CommandBringingIdentificator $command) {
		$this->lastCommandWithIdentificator = $command;
		$this->setLastCommand($command);
	}

	private function setLastCommand(Command $command) {
		$this->lastCommand = $command;
	}

	/**
	 * @return CommandBringingIdentificator
	 */
	private function getLastCommandWithIdentificator() {
		return $this->lastCommandWithIdentificator;
	}

	/**
	 * @return Command
	 */
	private function getLastCommand() {
		return $this->lastCommand;
	}

	/**
	 * @return Commands
	 */
	protected function getCommands() {
		return $this->commands;
	}
}