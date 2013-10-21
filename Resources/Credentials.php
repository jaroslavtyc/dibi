<?php
namespace Pribi\Resources;

use Pribi\Core\Object;

class Credentials extends Object {
	private $key;
	private $user;
	private $password;

	public function __construct($user, $password) {
		$this->key = hash('SHA256', spl_object_hash($this), TRUE);
		$this->user = $this->encrypt($user);
		$this->password = $this->encrypt($password);
	}

	private function encrypt($decrypted) {
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
		$ivBase64 = substr(base64_encode($iv), 0, 22);
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $decrypted, MCRYPT_MODE_CBC, $iv));

		return $ivBase64 . $encrypted;
	}

	public function getUser() {
		return $this->decrypt($this->user);
	}

	public function getPassword() {
		return $this->decrypt($this->password);
	}

	private function decrypt($raw) {
		$iv = $this->parseIv($raw);
		$encrypted = $this->parseEncrypted($raw);
		$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv);

		return rtrim($decrypted, "\0\4");
	}

	private function parseIv($raw) {
		return base64_decode(substr($raw, 0, 22) . '==');
	}

	private function parseEncrypted($raw) {
		return substr($raw, 22);
	}
}
