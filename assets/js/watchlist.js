const hearts = document.querySelectorAll('.watchlist');

hearts.forEach(
    function(heart) {
        heart.addEventListener('click', addToWatchlist);
    }
)

function addToWatchlist(event) {

// Get the link object you click in the DOM
    let watchlistImg = event.target;
    let link = watchlistImg.dataset.text;
// Send an HTTP request with fetch to the URI defined in the href
    fetch(link)
        // Extract the JSON from the response
        .then(res => res.json())
        // Then update the icon
        .then(function(res) {
            if (res.isInWatchlist) {
                watchlistImg.classList.remove('far'); // Remove the .far (empty heart) from classes in <i> element
                watchlistImg.classList.add('fas'); // Add the .fas (full heart) from classes in <i> element
            } else {
                watchlistImg.classList.remove('fas'); // Remove the .fas (full heart) from classes in <i> element
                watchlistImg.classList.add('far');
            }
        });

}