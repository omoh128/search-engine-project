// Function to perform a search when the user submits the form
function performSearch(event) {
    event.preventDefault(); // Prevent form submission and page reload

    const searchQuery = document.getElementById('search-input').value.trim();

    // Make an API request to the backend to get search results
    fetch(`/api/search?q=${encodeURIComponent(searchQuery)}`)
        .then(response => response.json())
        .then(data => {
            // Process and display search results
            displaySearchResults(data);
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
}

// Function to display search results on the page
function displaySearchResults(results) {
    const searchResultsContainer = document.getElementById('search-results');

    // Clear any previous search results
    searchResultsContainer.innerHTML = '';

    if (results.length === 0) {
        searchResultsContainer.innerHTML = '<p>No results found.</p>';
    } else {
        results.forEach(result => {
            const resultItem = createResultItem(result);
            searchResultsContainer.appendChild(resultItem);
        });
    }
}

// Function to create a search result item
function createResultItem(result) {
    const resultItem = document.createElement('div');
    resultItem.classList.add('search-result');

    const titleElement = document.createElement('h2');
    titleElement.textContent = result.title;

    const snippetElement = document.createElement('p');
    snippetElement.textContent = result.snippet;

    resultItem.appendChild(titleElement);
    resultItem.appendChild(snippetElement);

    return resultItem;
}

// Add event listener to the search form
document.getElementById('search-form').addEventListener('submit', performSearch);
