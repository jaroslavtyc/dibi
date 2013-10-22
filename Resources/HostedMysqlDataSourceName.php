<?php
namespace Pribi\Resources;

class HostedMysqlDataSourceName implements DataSourceName {
	private $host;
	private $port;
	private $databaseName;

	public function __construct($host, $port, $databaseName = FALSE) {
		$this->host = $host;
		$this->port = $port;
		$this->databaseName = $databaseName;
	}

	public function getName() {
		$name = 'mysql:host=' . $this->host;
		if ((string)$this->port !== '') {
			$name .= ';port=' . $this->port;
		}
		if ((string)$this->databaseName !== '') {
			$name .= ';dbname=' . $this->databaseName;
		}

		return $name;
	}
}
