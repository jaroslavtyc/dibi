<?php
namespace Pribi\Resources;

interface Driver {
	public function connect(Credentials $credentials);

	public function isConnected();

	public function disconnect();

	/**
	 * @param string $queryString
	 * @return int affected rows
	 */
	public function executeQuery($queryString);
}
