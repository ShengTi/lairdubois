<?php

namespace Ladb\CoreBundle\Utils;

class ElasticaQueryUtils {

	const NAME = 'ladb_core.elastica_query_utils';

	/////

	public function createShouldMatchPhraseQuery($field, $values) {
		$subQueries = explode(',', $values);
		$filter = new \Elastica\Query\Bool();
		foreach ($subQueries as $subQuery) {
			$filter->addShould(new \Elastica\Query\MatchPhrase($field, $subQuery));
		}
		return $filter;
	}
}