document.addEventListener('DOMContentLoaded', function() {
    const dropdownBtn = document.getElementById('userDropdownBtn');
    const dropdownMenu = document.getElementById('userDropdownMenu');

    // Initially hide the dropdown menu
    dropdownMenu.style.display = 'none';
    
    dropdownBtn.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();

        // Toggle the dropdown menu visibility
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
        } else {
            dropdownMenu.style.display = 'block';
        }
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!dropdownMenu.contains(event.target) && event.target !== dropdownBtn) {
            dropdownMenu.style.display = 'none';
        }
    });
});