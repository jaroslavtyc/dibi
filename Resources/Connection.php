<?php
namespace Pribi\Resources;
use \Pribi\Drivers\Driver;

class Connection extends \Pribi\Core\Object {
	private $driver;
	private $credentials;

	public function __construct(Driver $driver, Credentials $credentials) {
		$this->driver = $driver;
		$this->credentials = $credentials;
	}
}
