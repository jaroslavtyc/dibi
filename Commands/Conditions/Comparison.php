<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Identifiers\Identifier;

interface Comparison {
	public function equalTo(Identifier $identifier);

	public function equalOrGreaterThen(Identifier $identifier);

	public function equalOrLesserThen(Identifier $identifier);

	public function greaterThen(Identifier $identifier);

	public function lesserThen(Identifier $identifier);

	public function differentTo(Identifier $identifier);
}
