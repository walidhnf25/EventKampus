document.addEventListener("DOMContentLoaded", function() {
    const editButton = document.getElementById('editButton');
    const saveButton = document.getElementById('saveButton');
    editButton.addEventListener('click', function() {
        enableInputs();
    });

    saveButton.addEventListener('click', function() {
        disableInputs();
    });

    function enableInputs() {
        const inputFields = document.querySelectorAll('.card-body input');
        inputFields.forEach(input => {
            input.removeAttribute('readonly');
            input.classList.add('bg-white'); // Change input field background color to indicate edit mode
        });
        editButton.style.display = 'none';
        saveButton.style.display = 'block';
    }

    function disableInputs() {
        const inputFields = document.querySelectorAll('.card-body input');
        inputFields.forEach(input => {
            input.setAttribute('readonly', true);
            input.classList.remove('bg-white'); // Remove background color when in read-only mode
        });
        saveButton.style.display = 'none';
        editButton.style.display = 'block';
    }
});
