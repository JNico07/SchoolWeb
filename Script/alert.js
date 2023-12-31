document.addEventListener("DOMContentLoaded", function () {
    var alertMessage = document.getElementById('alert-message');
    var alertType = document.getElementById('alert-type');

    if (alertMessage && alertType) {
        var message = alertMessage.textContent;
        var type = alertType.textContent;

        if (message && type) {
            showAlert(message, type);
        }
    }
});

function showAlert(message, type) {
    alert(message); 
}
