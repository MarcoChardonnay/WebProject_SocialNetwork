window.onload = function() {
    var inputElement = document.getElementById('descrtext');
    var counterElement = document.getElementById('counter');

    inputElement.addEventListener('input', function() {
        var currentLength = inputElement.value.length;
        counterElement.innerText = currentLength + '/255';

        // Check if the length exceeds 255 and change color accordingly
        if (currentLength > 255) {
            counterElement.style.color = 'red';
        } else {
            counterElement.style.color = 'black'; // Reset to black if length is within limit
        }
    });
}