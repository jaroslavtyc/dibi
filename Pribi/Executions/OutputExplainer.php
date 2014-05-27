<?php
namespace Pribi\Executions;

class OutputExplainer implements Explainer {
	public function explain($queryString) {
		echo $queryString;
	}
}
 