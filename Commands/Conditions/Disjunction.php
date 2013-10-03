<?php
namespace Pribi\Commands\Conditions;

abstract class Disjunction extends UsingIdentificator implements Comparsion {
	use AndOrNegating;
}
