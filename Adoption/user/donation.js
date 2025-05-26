document.addEventListener('DOMContentLoaded', function () {
    const donationForm = document.getElementById('donationForm');
    const errorDisplay = document.getElementById('errorDisplay');
    const successPopup = document.getElementById('successPopup');
    const overlay = document.getElementById('overlay');
    const closePopup = document.getElementById('closePopup');

    donationForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent normal form submission

        // Gather form data
        const formData = new FormData(donationForm);

        // AJAX request
        fetch('donation_process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                donationForm.reset();
                errorDisplay.style.display = 'none';
                successPopup.style.display = 'block';
                overlay.style.display = 'block';
            } else {
                errorDisplay.innerHTML = data.messages.join('<br>');
                errorDisplay.style.display = 'block';
            }
        })
        .catch(error => {
            errorDisplay.innerHTML = 'Something went wrong. Please try again.';
            errorDisplay.style.display = 'block';
            console.error('Error:', error);
        });
    });

    // Close popup
    closePopup.addEventListener('click', function () {
        successPopup.style.display = 'none';
        overlay.style.display = 'none';
    });


    const cardRadio = document.getElementById('card');
    const ewalletRadio = document.getElementById('ewallet');
    const cardDetails = document.getElementById('cardDetails');
    const ewalletOptions = document.getElementById('ewalletOptions');

    cardRadio.addEventListener('change', function () {
        if (this.checked) {
            cardDetails.classList.remove('hidden');
            ewalletOptions.classList.add('hidden');
        }
    });

    ewalletRadio.addEventListener('change', function () {
        if (this.checked) {
            ewalletOptions.classList.remove('hidden');
            cardDetails.classList.add('hidden');
        }
    });

    const cardNumberInput = document.getElementById('cardNumber');
    cardNumberInput.addEventListener('input', function () {
        let value = this.value.replace(/\s/g, '');
        let formatted = value.match(/.{1,4}/g)?.join(' ') || '';
        this.value = formatted.substring(0, 19);
    });

    const expiryDateInput = document.getElementById('expiryDate');
    expiryDateInput.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2);
        }
        this.value = value.substring(0, 5);
    });

    const phoneNumberInput = document.getElementById('phoneNumber');
    phoneNumberInput.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        this.value = value.substring(0, 11);
    });
});
