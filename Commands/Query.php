<?php
namespace Pribi\Commands;

class Query extends \Pribi\Core\Object {
    private $commands = array();

    public function addCommand(Command $command) {
        if (!isset($this->commands[ $command->getType() ])) {
            $this->commands[ $command->getType() ] = array();
        }

        $this->commands[ $command->getType() ][] = $command;
    }
}
