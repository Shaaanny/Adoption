document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('applicationForm');
  const submitBtn = document.querySelector('.submit-btn');

  // Handle OTHER inputs
  function setupOtherInput(radioName, inputId) {
      const radios = document.querySelectorAll(`input[name="${radioName}"]`);
      const otherInput = document.getElementById(inputId);
      
      radios.forEach(radio => {
          radio.addEventListener('change', function() {
              if (this.value === 'OTHER') {
                  otherInput.style.display = 'inline-block';
                  otherInput.required = true;
              } else {
                  otherInput.style.display = 'none';
                  otherInput.required = false;
              }
          });
      });
  }

  // Setup place OTHER input
  setupOtherInput('place', 'otherPlace');

  // Handle occupation dropdown
  const occupationSelect = document.getElementById('occupation');
  const otherOccupationInput = document.getElementById('otherOccupation');

  occupationSelect.addEventListener('change', function() {
      if (this.value === 'OTHER') {
          otherOccupationInput.style.display = 'block';
          otherOccupationInput.required = true;
      } else {
          otherOccupationInput.style.display = 'none';
          otherOccupationInput.required = false;
      }
  });

  // Add input event listeners to all form fields
  const formInputs = form.querySelectorAll('input, select, textarea');
  formInputs.forEach(input => {
      input.addEventListener('input', function() {
          validateField(this);
      });
  });

  // Address validation - allow numbers
  const addressInput = document.getElementById('address');
  addressInput.addEventListener('input', function(e) {
      // Remove any pattern restrictions
      this.removeAttribute('pattern');
  });

  // Strict input enforcement for age and phone number
  form.age.addEventListener('input', function(e) {
      this.value = this.value.replace(/[^\d]/g, '').slice(0, 2);
  });
  form.phone.addEventListener('input', function(e) {
      this.value = this.value.replace(/[^\d]/g, '').slice(0, 11);
  });
  // Block digits for name, nationality, occupation
  [form.name, form.nationality, form.occupation].forEach(field => {
      field.addEventListener('input', function(e) {
          this.value = this.value.replace(/\d/g, '');
      });
  });

  // Form submission handler
  form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Gather field values
      const fields = {
        name: form.name.value,
        age: form.age.value,
        nationality: form.nationality.value,
        address: form.address.value,
        occupation: form.occupation.value,
        phone_number: form.phone.value
      };
      const validationResult = strictValidateFormFields(fields);
      console.log(validationResult);

      // Only show success if all fields are valid
      const allValid = Object.values(validationResult).every(v => v === "Valid");
      if (allValid) {
          showSuccessMessage();
          form.reset();
      } else {
          alert("Please correct the highlighted errors. See console for details.");
      }
  });

  // Field validation function
  function validateField(field) {
      if (field.required) {
          if (field.type === 'checkbox') {
              if (!field.checked) {
                  field.classList.add('invalid');
                  return false;
              }
          } else if (!field.value.trim()) {
              field.classList.add('invalid');
              return false;
          }
      }

      // Specific validation for different field types
      switch (field.type) {
          case 'email':
              if (!isValidEmail(field.value)) {
                  field.classList.add('invalid');
                  return false;
              }
              break;
          case 'tel':
              if (!isValidPhone(field.value)) {
                  field.classList.add('invalid');
                  return false;
              }
              break;
      }

      field.classList.remove('invalid');
      return true;
  }

  // Form validation function
  function validateForm() {
      let isValid = true;
      formInputs.forEach(input => {
          if (!validateField(input)) {
              isValid = false;
          }
      });
      return isValid;
  }

  // Email validation
  function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
  }

  // Phone number validation
  function isValidPhone(phone) {
      const phoneRegex = /^[\d\s-+()]{10,}$/;
      return phoneRegex.test(phone);
  }

  // Strict validation function for all fields
  function strictValidateFormFields(fields) {
    const result = {};

    // Name: must not contain digits
    if (!fields.name || /\d/.test(fields.name)) {
      result.name = "Invalid: must not contain digits and cannot be empty";
    } else {
      result.name = "Valid";
    }

    // Age: must be numeric, max 2 digits, 0-99
    if (!fields.age || !/^\d{1,2}$/.test(fields.age)) {
      result.age = "Invalid: must be numeric and at most 2 digits (0-99)";
    } else {
      result.age = "Valid";
    }

    // Nationality: must not contain digits
    if (!fields.nationality || /\d/.test(fields.nationality)) {
      result.nationality = "Invalid: must not contain digits and cannot be empty";
    } else {
      result.nationality = "Valid";
    }

    // Address: must not contain digits
    if (!fields.address || /\d/.test(fields.address)) {
      result.address = "Invalid: must not contain digits and cannot be empty";
    } else {
      result.address = "Valid";
    }

    // Occupation: must not contain digits
    if (!fields.occupation || /\d/.test(fields.occupation)) {
      result.occupation = "Invalid: must not contain digits and cannot be empty";
    } else {
      result.occupation = "Valid";
    }

    // Phone number: must be digits only, max 11 digits
    if (!fields.phone_number || !/^\d{1,11}$/.test(fields.phone_number)) {
      if (!fields.phone_number) {
        result.phone_number = "Invalid: cannot be empty";
      } else if (!/^\d+$/.test(fields.phone_number)) {
        result.phone_number = "Invalid: must contain digits only";
      } else if (fields.phone_number.length > 11) {
        result.phone_number = "Invalid: exceeds 11 digits";
      } else {
        result.phone_number = "Invalid";
      }
    } else {
      result.phone_number = "Valid";
    }

    return result;
  }

  // Success message
  function showSuccessMessage() {
      // Create overlay
      const overlay = document.createElement('div');
      overlay.className = 'success-modal-overlay';

      // Create modal
      const modal = document.createElement('div');
      modal.className = 'success-modal';
      modal.innerHTML = `
          <h3>Thank you for submitting your adoption application! 🐾</h3>
          <p>Our team will review your information and get back to you soon.</p>
      `;
      overlay.appendChild(modal);
      document.body.appendChild(overlay);

      // Remove modal after 3 seconds
      setTimeout(() => {
          overlay.remove();
      }, 3000);
  }
}); 