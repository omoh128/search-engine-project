<?php
// elasticsearch.php

require 'vendor/autoload.php'; // Require the Elasticsearch PHP client library

class Elasticsearch
{
    private $client;

    public function __construct($host, $port)
    {
        // Initialize the Elasticsearch client
        $this->client = Elasticsearch\ClientBuilder::create()
            ->setHosts(["{$host}:{$port}"])
            ->build();
    }

    public function searchInElasticsearch($index, $query)
    {
        // Define the search query using Elasticsearch DSL
        $params = [
            'index' => $index,
            'body' => [
                'query' => [
                    'match' => [
                        'content' => $query,
                    ],
                ],
            ],
        ];

        // Execute the search query
        $response = $this->client->search($params);

        // Process the search results and extract relevant data
        $hits = $response['hits']['hits'];
        $searchResults = [];

        foreach ($hits as $hit) {
            $result = [
                'title' => $hit['_source']['title'],
                'content' => $hit['_source']['content'],
            ];
            $searchResults[] = $result;
        }

        return $searchResults;
    }
}
?>
