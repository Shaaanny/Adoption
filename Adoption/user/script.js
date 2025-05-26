document.addEventListener("DOMContentLoaded", () => {
    // Image slider code
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        });
    }

    // Initialize the slider if slides exist
    if (slides.length > 0) {
        showSlide(currentSlide);
    }

    // Payment form code
    const paymentOptions = document.querySelectorAll('input[name="paymentMethod"]');
    const cardDetails = document.getElementById("cardDetails");
    const ewalletOptions = document.getElementById("ewalletOptions");

    function togglePaymentFields() {
        const selected = document.querySelector('input[name="paymentMethod"]:checked');
        if (selected) {
            if (selected.value === "card") {
                cardDetails.classList.remove("hidden");
                ewalletOptions.classList.add("hidden");
            } else {
                ewalletOptions.classList.remove("hidden");
                cardDetails.classList.add("hidden");
            }
        }
    }

    paymentOptions.forEach(option => {
        option.addEventListener("change", togglePaymentFields);
    });

    // Initialize payment fields on page load
    togglePaymentFields();
});


