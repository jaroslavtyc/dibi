<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts;

interface FromLike extends
	FromIdentifiable,
	\Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereable,
	\Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable,
	\Pribi\Commands\AnyQueryStatements\Limits\Parts\Limitable {

}
 
