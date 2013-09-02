<?php
namespace Pribi\Commands;

class FollowingCommands extends \Pribi\Core\Object {

	private $lastCommandBringingIdentificator;
	private $lastCommand;

	public function startTransaction() {
		$startTransaction = new StartTransaction($this);
		$this->setLastCommand($startTransaction);

		return $startTransaction;
	}

	public function withConsistentSnapshot() {
		$withConsistentSnapshot = new WithConsistentSnapshot($this);
		$this->setLastCommand($withConsistentSnapshot);

		return $withConsistentSnapshot;
	}

	public function commit() {
		$commit = new Commit($this);
		$this->setLastCommand($commit);

		return $commit;
	}

	public function select($identificator) {
		$select = new Select($identificator, $this);
		$this->setLastCommandBringingIdentificator($select);

		return $select;
	}

	public function from($identificator) {
		$from = new From($identificator, $this);
		$this->setLastCommandBringingIdentificator($from);

		return $from;
	}

	public function innerJoin($identificator) {
		$innerJoin = new InnerJoin($identificator, $this);
		$this->setLastCommandBringingIdentificator($innerJoin);

		return $innerJoin;
	}

	public function leftJoin($identificator) {
		$leftJoin = new LeftJoin($identificator, $this);
		$this->setLastCommandBringingIdentificator($leftJoin);

		return $leftJoin;
	}

	public function rightJoin($identificator) {
		$rightJoin = new RightJoin($identificator, $this);
		$this->setLastCommandBringingIdentificator($rightJoin);

		return $rightJoin;
	}

	public function on($identificator) {
		$on = new On($identificator, $this);
		$this->setLastCommand($on);

		return $on;
	}

	public function conjunction($identificator) {
		$conjunction = new Conjunction($identificator, $this);
		$this->setLastCommand($conjunction);

		return $conjunction;
	}

	public function disjunction($identificator) {
		$disjunction = new Disjunction($identificator, $this);
		$this->setLastCommand($disjunction);

		return $disjunction;
	}

	public function negation() {
		$negation = new Negation($this);
		$this->setLastCommand($negation);

		return $negation;
	}

	public function in($firstIdentificator) {
		$inArray = new InArray(\func_get_args(), $this);
		$this->setLastCommand($inArray);

		return $inArray;
	}

	public function inArray(array $identificators) {
		$inArray = new InArray($identificators, $this);
		$this->setLastCommand($inArray);

		return $inArray;
	}

	public function equalTo($identificator) {
		$equalTo = new EqualTo($identificator, $this);
		$this->setLastCommand($equalTo);

		return $equalTo;
	}

	public function equalOrGreaterThen($identificator) {
		$equalOrGreaterThen = new EqualOrGreaterThen($identificator, $this);
		$this->setLastCommand($equalOrGreaterThen);

		return $equalOrGreaterThen;
	}

	public function greaterThen($identificator) {
		$greaterThen = new GreaterThen($identificator, $this);
		$this->setLastCommand($greaterThen);

		return $greaterThen;
	}

	public function equalOrLesserThen($identificator) {
		$equalOrLesserThen = new EqualOrLesserThen($identificator, $this);
		$this->setLastCommand($equalOrLesserThen);

		return $equalOrLesserThen;
	}

	public function lesserThen($identificator) {
		$lesserThen = new LesserThen($identificator, $this);
		$this->setLastCommand($lesserThen);

		return $lesserThen;
	}

	public function differentTo($identificator) {
		$differentTo = new DifferentTo($identificator, $this);
		$this->setLastCommand($differentTo);

		return $differentTo;
	}

	public function where($identificator) {
		$where = new Where($identificator, $this);
		$this->setLastCommand($where);

		return $where;
	}

	public function limit($amount) {
		$limit = new Limit(0, $amount);
		$this->setLastCommand($limit);

		return $limit;
	}

	public function offsetAndLimit($offset, $amount) {
		$amount = new Limit($offset, $amount);
		$this->setLastCommand($amount);

		return $amount;
	}

	/**
	 * @return CommandBringingIdentificator
	 */
	protected function alias($name) {
		if ($this->getLastCommandBringingIdentificator() === $this->getLastCommand()) {
			$this->getLastCommandBringingIdentificator()->setAlias($name);
		} else {
			throw new Exceptions\AliasHasToDirectlyFollowIdentificator(sprintf('Followed [%s]', \get_class($this->getLastCommand())));
		}

		return $this->getLastCommandBringingIdentificator();
	}

	private function setLastCommandBringingIdentificator(CommandBringingIdentificator $command) {
		$this->lastCommandBringingIdentificator = $command;
		$this->setLastCommand($command);
	}

	private function setLastCommand(Command $command) {
		$this->lastCommand = $command;
	}

	/**
	 * @return CommandBringingIdentificator
	 */
	private function getLastCommandBringingIdentificator() {
		return $this->lastCommandBringingIdentificator;
	}

	/**
	 * @return Command
	 */
	private function getLastCommand() {
		return $this->lastCommand;
	}
}