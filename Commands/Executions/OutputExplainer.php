<?php
namespace Pribi\Commands\Executions;

class OutputExplainer implements Explainer {
	public function explain($queryString) {
		echo $queryString;
	}
}
 