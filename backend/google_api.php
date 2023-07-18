<?php
// google_api.php

require_once 'config.php';

function fetchGoogleResults($apiKey, $query) {
    // API request URL with the provided API key and search query
    $searchEngineId = 'AIzaSyD1ZRYj56ytYPHGwCNo2aC1U8QsOf3epLE'; // 
    $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$searchEngineId}&q=" . urlencode($query);

    // Make the API request and fetch the response
    $response = file_get_contents($url);

    // Check if the request was successful
    if ($response === false) {
        // Handle the error here
        // For example, you can log the error, notify the user, or return an empty array
        error_log("Google API request failed: " . error_get_last()['message']);
        return [];
    }

    // Parse the JSON response and extract search results
    $data = json_decode($response, true);

    // Check if there was an error in the API response
    if (isset($data['error'])) {
        // Handle the API error here
        // For example, you can log the error, notify the user, or return an empty array
        error_log("Google API error: " . $data['error']['message']);
        return [];
    }

    $googleResults = [];

    if (isset($data['items'])) {
        foreach ($data['items'] as $item) {
            $result = [
                'title' => $item['title'],
                'snippet' => $item['snippet'],
                'link' => $item['link'],
            ];
            $googleResults[] = $result;
        }
    }

    return $googleResults;
}
