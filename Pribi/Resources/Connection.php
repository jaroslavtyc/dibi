<?php
namespace Pribi\Resources;

use Pribi\Core\Object;

class Connection extends Object {
	private $driver;
	private $credentials;

	public function __construct(Driver $driver, Credentials $credentials) {
		$this->driver = $driver;
		$this->credentials = $credentials;
		$this->connect($driver, $credentials);
	}

	protected function connect(Driver $driver, Credentials $credentials) {
		$driver->connect($credentials);
	}

	public function executeQuery($query) {
		return $this->driver->execute($query);
	}
}
