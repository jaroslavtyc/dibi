<?php
namespace Pribi\Commands\Conditions;

abstract class Conjunction extends UsingIdentificator implements Comparsion {
	use AndOrNegating;
}
