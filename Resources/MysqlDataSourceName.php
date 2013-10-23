<?php
namespace Pribi\Resources;

abstract class MysqlDataSourceName implements DataSourceName {
	private $uri;
	private $databaseName;

	protected function __construct($uri, $databaseName = FALSE) {
		$this->uri = $uri;
		$this->databaseName = $databaseName;
	}

	public function getName() {
		$name = 'mysql:' . $this->uri;
		if ((string)$this->databaseName !== '') {
			$name .= ';dbname=' . $this->databaseName;
		}

		return $name;
	}
}
