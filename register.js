document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();  
    var email = document.getElementById("email").value;
    var errorMessage = document.getElementById("error-message");
    var successMessage = document.getElementById("success-message");
    var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    if (!gmailPattern.test(email)) {
        errorMessage.textContent = "Please enter a valid Gmail address.";
        successMessage.style.display = "none";  
    } else {
        errorMessage.textContent = "";  
        successMessage.style.display = "block";
        setTimeout(function() {
            alert("Form successfully submitted!"); 

        }, 500);  
    }
});
