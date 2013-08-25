<?php
namespace Pribi\Commands;

trait FluentProvider {
	/**
 	 * @return Fluent
 	 */
	abstract protected function getNextToFluid();
}