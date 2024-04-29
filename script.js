const showFieldRadio = document.getElementById('showField');
const hideFieldRadio = document.getElementById('hideField');
const fieldContainer = document.getElementById('fieldContainer');

showFieldRadio.addEventListener('change', () => {
    if (showFieldRadio.checked) {
        fieldContainer.style.display = 'block';
    }
});

hideFieldRadio.addEventListener('change', () => {
    if (hideFieldRadio.checked) {
        fieldContainer.style.display = 'none';
    }
});
