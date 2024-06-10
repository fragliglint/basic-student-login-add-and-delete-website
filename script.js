document.addEventListener("DOMContentLoaded", function() {

    // Form validation
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // Example of a button click event
    document.getElementById("registerButton").addEventListener("click", function() {
        alert("Form Submitted Successfully!");
    });

});
