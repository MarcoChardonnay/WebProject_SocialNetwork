window.addEventListener('load', function() {
    document.getElementById('searchUsers').addEventListener('keyup', function() {
        var searchQuery = this.value;
        if(searchQuery.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'searchUsers.php?query=' + searchQuery, true);
            xhr.onload = function() {
                if(this.status == 200) {
                    document.getElementById('searchResult').innerHTML = this.responseText;
                }
            }
            xhr.send();
        } else {
            document.getElementById('searchResult').innerHTML = "";
        }
    });
});