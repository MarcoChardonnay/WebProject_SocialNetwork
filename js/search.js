window.addEventListener('load', function() {
    document.getElementById('searchUsers').addEventListener('keyup', function() {
        var searchQuery = this.value;
        if(searchQuery.length > 0) {
            //send AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'searchUsers.php?query=' + searchQuery, true);
            xhr.onload = function() {
                if(this.status == 200) {    // 200 means OK
                    // I change the HTML inside of the searchResult area
                    document.getElementById('searchResult').innerHTML = this.responseText;
                }
            }
            xhr.send();
        } else {
            document.getElementById('searchResult').innerHTML = "";
        }
    });
});