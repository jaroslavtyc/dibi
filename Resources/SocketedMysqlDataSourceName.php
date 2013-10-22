<?php
namespace Pribi\Resources;

class SocketedMysqlDataSourceName implements DataSourceName {
	private $unixSocket;
	private $databaseName;

	public function __construct($unixSocket, $databaseName = FALSE) {
		$this->unixSocket = $unixSocket;
		$this->databaseName = $databaseName;
	}

	public function getName() {
		$name = 'mysql:unix_socket=' . $this->unixSocket;
		if ((string)$this->databaseName !== '') {
			$name .= ';dbname=' . $this->databaseName;
		}

		return $name;
	}
}
