document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.toggleReadStatus').forEach(button => {
        button.addEventListener('click', function() {
            const notifId = this.getAttribute('data-notif-id');
            const isRead = this.value === 'Mark as Unread';
            console.log("Read status: " + isRead +", Notification ID: " + notifId);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'toggleread.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status == 200) {
                    console.log(this.responseText);
                    if (isRead) {
                        button.value = 'Mark as Read';
                        //TODO: change the background color of the notification
                    } else {
                        button.value = 'Mark as Unread';
                        //TODO: change the background color of the notification
                    }
                }
            };
            xhr.send('ID_notif=' + notifId + '&isRead=' + isRead);
        });
    });
});