<?php
// search_functions.php

function combineResults($elasticsearchResults, $googleResults) {
    // Check if either result array is null and return the other array as is
    if ($elasticsearchResults === null) {
        return $googleResults;
    }

    if ($googleResults === null) {
        return $elasticsearchResults;
    }

    // Both arrays are not null, so merge them and return the combined result
    return array_merge($elasticsearchResults, $googleResults);
}
