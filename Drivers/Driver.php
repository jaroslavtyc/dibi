<?php
namespace Pribi\Drivers;

interface Driver {
	function connect(array $config);
	function disconnect();
	function query($sql);
	function getAffectedRows();
	function getInsertId($sequence);
	function begin($savepoint = NULL);
	function commit($savepoint = NULL);
	function rollback($savepoint = NULL);
	function getResource();
	function getReflector();
	function escape($value, $type);
	function escapeLike($value, $pos);
	function applyLimit(& $sql, $limit, $offset);
}
