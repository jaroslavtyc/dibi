<?php
namespace Pribi\Resources;

class DataSourceName {
	private $host;
	private $port;
	private $socket;
	private $databaseName;

	protected function __construct($host, $port, $socket, $databaseName = FALSE) {
		$this->host = $host;
		$this->port = $port;
		$this->socket = $socket;
		$this->databaseName = $databaseName;
	}

	public function getHost() {
		return $this->host;
	}

	public function getPort() {
		return $this->port;
	}

	public function getSocket() {
		return $this->socket;
	}

	public function getDatabaseName() {
		return $this->databaseName;
	}
}
