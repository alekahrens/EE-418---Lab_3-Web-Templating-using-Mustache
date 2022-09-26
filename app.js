$( document ).ready(function() {
    fetchData();
});

function fetchData() {
    //TODO: write AJAX code to fetch the data from service.php. On successful response, call renderbooks() and pass the received books data
    $.ajax({
        
        //Request URL
        url:"service.php",
        
        // The data to send
        data: {
            id:$books
        },
        
        //Type of request
        type: "GET",
    })
        //Code for successful request
        .done(function(json)) {
              renderBooks($books);
        })
        // Code to run if the request fails
        .fail(function( xhr, status, errorThrown ) {
         alert( "Sorry, there was a problem!" );
         console.log( "Error: " + errorThrown );
         console.log( "Status: " + status );
         console.dir( xhr );
  })
    
}

function renderBooks(booksData) {
    //TODO: use mustache to render booksData and books.mustache into #tarter
  fetch('books.mustache')
    .then((response) => response.text())
    .then((books) => {
      var rendered = Mustache.render(books, { name: 'tarter' });
      document.getElementById('target').innerHTML = rendered;    
    );
}
}

