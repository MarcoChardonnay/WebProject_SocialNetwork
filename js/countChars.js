window.onload = function() {
    var inputElement = document.getElementById('descrtext');
    var counterElement = document.getElementById('counter');

    inputElement.addEventListener('input', function() {
        var currentLength = inputElement.value.length;
        counterElement.innerText = currentLength + '/1500';

        // Check if the length exceeds 1500 and change color accordingly
        if (currentLength > 1500) {
            counterElement.style.color = 'red';
        } else {
            counterElement.style.color = 'black'; // Reset to black if length is within limit
        }
    });
}