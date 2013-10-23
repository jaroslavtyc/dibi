<?php
namespace Pribi\Resources;

interface Driver {
	public function connect(Credentials $credentials);

	public function isConnected();

	public function disconnect();

	/**
	 * @param $queryString
	 * @return \Pribi\Resources\Prepared
	 */
	public function prepare($queryString);
}
