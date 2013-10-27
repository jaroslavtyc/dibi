<?php
namespace Pribi\Resources;

class HostetMysqlDataSourceName extends DataSourceName {
	public function __construct($host, $port, $socket, $databaseName = FALSE) {
		parent::__construct($host, $port, FALSE, $databaseName);
	}
}
