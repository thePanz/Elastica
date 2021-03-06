<?php

namespace Elastica;

/**
 * Elastica searchable interface.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
interface SearchableInterface
{
    /**
     * Searches results for a query.
     *
     * {
     *     "from" : 0,
     *     "size" : 10,
     *     "sort" : {
     *          "postDate" : {"order" : "desc"},
     *          "user" : { },
     *          "_score" : { }
     *      },
     *      "query" : {
     *          "term" : { "user" : "kimchy" }
     *      }
     * }
     *
     * @param string|array|\Elastica\Query $query   Array with all query data inside or a Elastica\Query object
     * @param null                         $options
     * @param string                       $method  OPTIONAL Request method (use const's) (default = Request::POST)
     *
     * @return \Elastica\ResultSet with all results inside
     */
    public function search($query = '', $options = null, $method = Request::POST);

    /**
     * Counts results for a query.
     *
     * If no query is set, matchall query is created
     *
     * @param string|array|\Elastica\Query $query  Array with all query data inside or a Elastica\Query object
     * @param string                       $method OPTIONAL Request method (use const's) (default = Request::POST)
     *
     * @return int number of documents matching the query
     */
    public function count($query = '', $method = Request::POST);

    /**
     * @param \Elastica\Query|string $query
     * @param array                  $options
     *
     * @return \Elastica\Search
     */
    public function createSearch($query = '', $options = null);
}
