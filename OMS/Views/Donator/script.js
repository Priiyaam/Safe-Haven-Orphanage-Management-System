document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('donation-form');
    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        const name = document.getElementById('name').value;
        const organization = document.getElementById('organization').value;
        const purpose = document.getElementById('purpose').value;
        const amount = document.getElementById('amount').value;

        if (name === '' || organization === '' || purpose === '' || amount === '') {
            alert('All fields are required.');
            return false;
        }

        return true;
    }
});
