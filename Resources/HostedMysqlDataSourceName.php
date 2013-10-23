<?php
namespace Pribi\Resources;

class HostedMysqlDataSourceName extends MysqlDataSourceName {
	public function __construct($host, $port, $databaseName = FALSE) {
		$uri = $host;
		if ((string)$port !== '') {
			$uri .= ';port=' . $port;
		}
		parent::__construct($uri, $databaseName);
	}
}
