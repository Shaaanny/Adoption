// donation.js

// Handle form submission and popup functionality
document.addEventListener('DOMContentLoaded', function() {
    const donationForm = document.querySelector('.donation-form');
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('successPopup');
    const closePopupBtn = document.getElementById('closePopup');

    // Form submission handler
    donationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show overlay and popup
        overlay.classList.add('show');
        popup.classList.add('show');
        popup.style.animation = 'bounceIn 0.75s cubic-bezier(0.68, -0.55, 0.265, 1.55)';

        // Reset all form fields
        this.reset();
        
        // Reset any custom fields that might not be cleared by form.reset()
        document.getElementById('cardNumber').value = '';
        document.getElementById('expiryDate').value = '';
        document.getElementById('cvv').value = '';
        document.getElementById('phoneNumber').value = '';

        // Hide card and ewallet details sections
        document.getElementById('cardDetails').classList.add('hidden');
        document.getElementById('ewalletOptions').classList.add('hidden');
    });

    // Close popup when clicking the close button
    closePopupBtn.addEventListener('click', closePopup);

    // Close popup when clicking the overlay
    overlay.addEventListener('click', closePopup);

    // Function to close the popup
    function closePopup() {
        overlay.classList.remove('show');
        popup.classList.remove('show');
    }

    // Handle payment method selection
    const cardRadio = document.getElementById('card');
    const ewalletRadio = document.getElementById('ewallet');
    const cardDetails = document.getElementById('cardDetails');
    const ewalletOptions = document.getElementById('ewalletOptions');

    cardRadio.addEventListener('change', function() {
        if (this.checked) {
            cardDetails.classList.remove('hidden');
            ewalletOptions.classList.add('hidden');
        }
    });

    ewalletRadio.addEventListener('change', function() {
        if (this.checked) {
            ewalletOptions.classList.remove('hidden');
            cardDetails.classList.add('hidden');
        }
    });

    // Format card number input with spaces
    const cardNumberInput = document.getElementById('cardNumber');
    cardNumberInput.addEventListener('input', function() {
        let value = this.value.replace(/\s/g, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || '';
        this.value = formattedValue.substring(0, 19);
    });

    // Format expiry date input (MM/YY)
    const expiryDateInput = document.getElementById('expiryDate');
    expiryDateInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2);
        }
        this.value = value.substring(0, 5);
    });

    // Format phone number input
    const phoneNumberInput = document.getElementById('phoneNumber');
    phoneNumberInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value.length > 11) {
            value = value.substring(0, 11);
        }
        this.value = value;
    });
}); 