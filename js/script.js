// Show & Hide the file input in forms

const showFieldRadio = document.getElementById('showField');
const hideFieldRadio = document.getElementById('hideField');
const fieldContainer = document.getElementById('fieldContainer');

showFieldRadio.addEventListener('change', () => {
    // When the user wants to change the photo, the file input field appears
    if (showFieldRadio.checked) {
        fieldContainer.style.display = 'block';
    }
});

hideFieldRadio.addEventListener('change', () => {
    // else it remains hidden
    if (hideFieldRadio.checked) {
        fieldContainer.style.display = 'none';
    }
});

