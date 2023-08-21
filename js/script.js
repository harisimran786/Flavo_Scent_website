document.addEventListener("DOMContentLoaded", function() {
    // Example: Add confirmation before deleting feedback
    const deleteButtons = document.querySelectorAll(".delete-feedback");
    
    deleteButtons.forEach(button => {
        button.addEventListener("click", function(e) {
            if (!confirm("Are you sure you want to delete this feedback?")) {
                e.preventDefault();
            }
        });
    });
});
