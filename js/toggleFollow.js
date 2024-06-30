window.addEventListener('keyup', function(){
    //select all buttons with class toggleFollow, cicle to them
    document.querySelectorAll('.toggleFollow').forEach(button => {
        console.log(button);
        //add event listener to button
        button.addEventListener('click', function () {
            const userIdData = this.getAttribute('data-user-id');
            const userId = Number(userIdData.substring(1)); // Remove the first character X or S from the string
            //check if button text is unfollow which means user is already following -> followStatus = true
            const followStatus = this.value === 'Unfollow';
            //print to console
            console.log("Follow status: " + followStatus + " User ID: " + userId);
            //send AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'follow.php', true);
            // set content type header information for sending url encoded variables in a request
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status == 200) {
                    // Handle response here, TODO: update the button text
                    console.log(this.responseText);
                    //if the user is following, change the button text to unfollow
                    if (followStatus) {
                        button.value = 'Follow';
                    } else {
                        //if the user is not following, change the button text to follow
                        button.value = 'Unfollow';
                    }
                }
            };
            //send the request with the user id and the follow status encoded
            xhr.send('ID_user=' + userId + '&following=' + followStatus);
        });
    });
});