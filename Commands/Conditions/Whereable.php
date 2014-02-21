<?php
namespace Pribi\Commands;

interface Whereable {
	public function where($subject);

	public function whereNot($subject);
}
