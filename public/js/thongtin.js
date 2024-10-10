document.addEventListener('DOMContentLoaded', function() {
    // Alert messages timeout (for success or error messages)
    let alerts = document.querySelectorAll('.alert');
    if (alerts.length) {
        setTimeout(function() {
            alerts.forEach(alert => alert.style.display = 'none');
        }, 5000); // Hide alert after 5 seconds
    }

    // Smooth scroll to top when "Back to Home" button is clicked
    const scrollButton = document.querySelector('.buttons button');
    if (scrollButton) {
        scrollButton.addEventListener('click', function(event) {
            event.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});