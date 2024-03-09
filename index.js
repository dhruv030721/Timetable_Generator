function FormSubmission() {
    var inputs = document.querySelectorAll('#timetableForm input');
    var valid = true;
    inputs.forEach(function (input) {
        if (!input.value.trim()) {
            valid = false;
        }
    });
    if (!valid) {
        alert('Please fill in all the fields.');
    } else {
        document.getElementById('timetableForm').submit();
    }
}