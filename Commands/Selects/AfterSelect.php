<?php
namespace Pribi\Commands\Selects;

interface AfterSelect {
	public function select($subject);

	public function selectNot($subject);

	public function from($subject);

	public function where($subject);

	public function whereNot($subject);
}
