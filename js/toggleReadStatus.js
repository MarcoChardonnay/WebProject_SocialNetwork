document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.toggleReadStatus').forEach(button => {
        button.addEventListener('click', function() {
            const notifId = this.getAttribute('data-notif-id');
            const isRead = this.value === 'Read';
            console.log("Read status: " + isRead +", Notification ID: " + notifId);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'toggleread.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status == 200) {
                    // Parse the JSON response
                    // var response = JSON.parse(this.responseText);
                    // console.log(response.message);
                    console.log(this.responseText);
                    if (isRead) {
                        console.log("isReadtrue");
                    } else {
                        button.value = 'Read';
                        //make the button disabled
                        button.disabled = true;
                        //TODO: change the background color of the notification
                        //structure div>ul>li>form>button; li must change class
                        button.parentElement.parentElement.classList.remove('unread');
                        button.parentElement.parentElement.classList.add('read');
                    }
                }
            };
            xhr.send('ID=' + notifId + '&isRead=' + isRead);
        });
    });
});