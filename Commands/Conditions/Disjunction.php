<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class Disjunction extends WithIdentifier implements Comparison {
	use AndOrNegating;
}
