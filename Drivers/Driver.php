<?php
namespace Pribi\Drivers;

use Pribi\Resources\Credentials;
use Pribi\Resources\DataSourceName;

interface Driver {
	public function connect(DataSourceName $dsn, Credentials $credentials);

	public function isConnected();

	public function disconnect();

	/**
	 * @param $queryString
	 * @return \Pribi\Resources\Prepared
	 */
	public function prepare($queryString);
}
