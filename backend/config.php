<?php

class Config
{
    // Configuration properties
    private $elasticsearchHost;
    private $elasticsearchPort;
    private $googleApiKey;

    // Constructor to set default values
    public function __construct()
    {
        $this->elasticsearchHost = 'localhost'; // Default Elasticsearch host
        $this->elasticsearchPort = 9200;       // Default Elasticsearch port
        $this->googleApiKey = 'AIzaSyD1ZRYj56ytYPHGwCNo2aC1U8QsOf3epLE'; // Replace with your actual Google API key
    }

    // Getters for configuration options
    public function getElasticsearchHost()
    {
        return $this->elasticsearchHost;
    }

    public function getElasticsearchPort()
    {
        return $this->elasticsearchPort;
    }

    public function getGoogleApiKey()
    {
        return $this->googleApiKey;
    }
}

// Create a new instance of the Config class
$config = new Config();

?>
