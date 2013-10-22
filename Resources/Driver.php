<?php
namespace Pribi\Resources;

interface Driver {
	public function connect(Credentials $credentials);

	public function isConnected();
}
