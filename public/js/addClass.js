function validateForm() {
    const title = document.getElementById('title');
    const from = document.getElementById('from');
    const to = document.getElementById('to');
    const price = document.getElementById('classPrice');
    const isFree = document.querySelector('input[name="price"]:checked');
    const daysCheckboxes = document.querySelectorAll('input[name="days[]"]:checked');

    const titleError = document.getElementById('title-err');
    const fromError = document.getElementById('from-err');
    const toError = document.getElementById('to-err');
    const priceError = document.getElementById('price-err');
    const isFreeError = document.getElementById('isFree-err');
    const daysError = document.getElementById('days-err');

    let isValid = true;

    // Title validation
    if (title.value.trim() === '') {
        titleError.innerText = 'Title is required';
        isValid = false;
    } else {
        titleError.innerText = '';
    }

    // From validation
    if (from.value.trim() === '') {
        fromError.innerText = 'From time is required';
        isValid = false;
    } else {
        fromError.innerText = '';
    }

    // To validation
    if (to.value.trim() === '') {
        toError.innerText = 'To time is required';
        isValid = false;
    } else {
        toError.innerText = '';
    }

    // Price validation
    if (isFree && isFree.value === 'NotFree' && price.value.trim() === '') {
        priceError.innerText = 'Class Price is required';
        isValid = false;
    } else {
        priceError.innerText = '';
    }

    // IsFree validation
    if (!isFree) {
        isFreeError.innerText = 'Free field is required';
        isValid = false;
    } else {
        isFreeError.innerText = '';
    }

    // Days validation
    if (daysCheckboxes.length === 0) {
        daysError.innerText = 'At least one day must be selected';
        isValid = false;
    } else {
        daysError.innerText = '';
    }

    return isValid;
}
