<?php
namespace Pribi\Commands\Conditions;

abstract class BaseNull extends WithoutIdentifier implements AndOrUsable {
	use AndOring;
}
