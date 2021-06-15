document.getElementById("homeLoginForm").onsubmit = validate;

function validate() {
    let isValid = true;

    //set all errors to be hidden
    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++){
        errors[i].style.display = "none";
    }

    // Check username - Must not be empty, or 4 or less characters
    let username = document.getElementById("uname").value;
    if (!username.match("/(?=.*[a-z]).{4,}/")) {
        let errUser = document.getElementById("err-user");
        errUser.style.display = "inline";
        isValid = false;
    }

    //Check password - Must not be empty, 8 or less characters, and must include a special character
    let password = document.getElementById("pass").value;
    if (!password.match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/")) { //number, letter, capital letter, 8 chars
        let errPass = document.getElementById("err-pass");
        errPass.style.display = "inline";

        isValid = false;
    }

    return isValid;
}

document.getElementById("pass").onclick = logPassVisible;
//make the password on the login (home) page toggleable
function logPassVisible() {
    let logPass = document.getElementById("pass");
    if (logPass.type === "password") {
        logPass.type = "text";
    } else {
        logPass.type = "password";
    }
}

document.getElementById("homeLoginForm").onsubmit = validateLog;
//make the password on the register page toggleable
function validateLog() {
    let isValid = true;

    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++){
        errors[i].style.display = "none";
    }

    // Check username - Must not be empty, or 4 or less characters
    let username = document.getElementById("uname").value;
    if (username.length <= 0) { //username === ""
        let errUser = document.getElementById("err-user");
        errUser.style.display = "inline";
        isValid = false;
    }

    //Check password - Must not be empty, 8 or less characters, and must include a special character
    let password = document.getElementById("pass").value;
    if (password.length <= 0){ //password === ""
        let errPass = document.getElementById("err-pass");
        errPass.style.display = "inline";
        isValid = false;
    }

    return isValid;
}
