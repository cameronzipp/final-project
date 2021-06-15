// document.getElementById("psw").onfocus = register;

let passw = document.getElementById("pass");
let letter = document.getElementById("letter");
let capital = document.getElementById("capital");
let number = document.getElementById("number");
let length = document.getElementById("length");
let special = document.getElementById("special");
let passBox = document.getElementById("message");

// When the user clicks on the password field, show the message box
passw.onfocus = function() {
    passBox.style.display = "block";
}

// When the user clicks outside of the password field, hide the message box unless it has stuff in it
passw.onblur = function() {
    if (passw.value.length <= 0) {
        passBox.style.display = "none";
    }
}

// When the user starts to type something inside the password field
passw.onkeyup = function() {

    // Validate lowercase letters
    let lowerCaseLetters = /[a-z]/g;
    if(passw.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    let upperCaseLetters = /[A-Z]/g;
    if(passw.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    let numbers = /[0-9]/g;
    if(passw.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if(passw.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }

    // Validate special characters
    let specialChar = /[!@#$%^&*]/
    if(passw.value.match(specialChar)) {
        special.classList.remove("invalid");
        special.classList.add("valid");
    } else {
        special.classList.remove("valid");
        special.classList.add("invalid");
    }
}

document.getElementById("showPSW").onclick = regPassVisible;

function regPassVisible() {
    let regPass = document.getElementById("psw");
    if (regPass.type === "password") {
        regPass.type = "text";
    } else {
        regPass.type = "password";
    }
}