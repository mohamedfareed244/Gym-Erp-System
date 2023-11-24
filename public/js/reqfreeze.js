
const freezeButton = document.getElementById("freeze-button");
const freezeWeeksInput = document.getElementById("freeze-weeks");
const remainingFreezeAttempts = 5; // To be fetched from the database later on

const modal = document.getElementById("myModal");
const confirmationText = document.getElementById("confirmation-text");
const confirmButton = document.getElementById("confirm-button");
const cancelButton = document.getElementById("cancel-button");
const closeBtn = document.querySelector(".close-popup");
const errorMessage = document.getElementById("error-message");
const modalMessage = document.getElementById("modal-message");

function showmodal(message) {
    confirmationText.textContent = message;
    modal.style.display = "block";
    confirmButton.style.display = "block";
    cancelButton.style.display = "block";
    closeBtn.style.display = "block";
    modalMessage.style.display = "none";
}

function resetmodal() {
    modal.style.display = "none";
    confirmationText.textContent = '';
    confirmButton.style.display = "none";
    cancelButton.style.display = "none";
    closeBtn.style.display = "none";
    modalMessage.style.display = "none";
}

let isFrozen = false; // Track if the freeze button is already pressed

freezeButton.addEventListener("click", function() {
    const freezeWeeks = freezeWeeksInput.value;
    if (isFrozen) {
        // Show modal message instead of the whole modal
        showmodal("Your request is submitted, and you will receive a confirmation email.");
        confirmButton.style.display = "none";
    cancelButton.style.display = "none";
    } else if (freezeWeeks !== '' && parseInt(freezeWeeks) >= 1 && parseInt(freezeWeeks) <=
        remainingFreezeAttempts) {
        showmodal(`Are you sure you want to freeze ${freezeWeeks} weeks?`);
        isFrozen = true; // Set the freeze button state to pressed
    } else {
        errorMessage.style.display = "block";
        modal.style.display = "none";
    }
});


closeBtn.addEventListener("click", function() {
    resetmodal();
});

confirmButton.addEventListener("click", function() {
    if (confirmationText.textContent) {
        resetmodal();

        modal.style.display = "block";
        modalMessage.style.display = "block";
        modalMessage.textContent = "Your request is submitted, and you will receive a confirmation email.";

        // Set a timer to hide the modal after 2 seconds (2000 milliseconds)
        setTimeout(function() {
            modal.style.display = "none";
            modalMessage.style.display = "none";
        }, 2000); // 2 seconds


    }

});

cancelButton.addEventListener("click", function() {
    if (confirmationText.textContent) {
        resetmodal();

        modal.style.display = "block";
        modalMessage.style.display = "block";
        modalMessage.textContent = "No request submitted.";

        // Set a timer to hide the modal after 2 seconds (2000 milliseconds)
        setTimeout(function() {
            modal.style.display = "none";
            modalMessage.style.display = "none";
        }, 2000); // 2 seconds


    }
});

function reqfreeze() {
const freezeButton = document.getElementById("freeze-button");

freezeButton.addEventListener("click", function() {
const freezeWeeks = freezeWeeksInput.value;

const xhr = new XMLHttpRequest();
xhr.open("POST", "freeze_membership.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
    }
};

xhr.send("action=freezeMembership&freezeWeeks=" + freezeWeeks);
});

function fetchFreezeInfo() {

    fetch("fetch_freeze_info.php")
        .then(response => response.json())
        .then(data => {
            // Update the remaining freeze attempts
            remainingFreezeAttempts = data.remainingFreezeAttempts;
        })
        .catch(error => console.error("Error fetching freeze info:", error));
}

fetchFreezeInfo();


}