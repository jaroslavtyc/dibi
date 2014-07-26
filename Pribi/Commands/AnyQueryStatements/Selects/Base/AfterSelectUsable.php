<?php
namespace Pribi\Commands\AnyQueryStatements\Selects\Base;

interface AfterSelectUsable {
	public function select($subject);

	public function selectNot($subject);

	public function from($subject);

	public function where($subject);

	public function whereNot($subject);
}
