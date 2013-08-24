<?php
namespace Pribi\Resources;
use \Pribi\Drivers\LegacyDriver;

class Connection extends \Pribi\Core\Object {
	private $driver;
	private $credentials;

	public function __construct(LegacyDriver $driver, Credentials $credentials) {
		$this->driver = $driver;
		$this->credentials = $credentials;
	}
}
