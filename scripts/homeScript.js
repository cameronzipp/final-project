document.getElementById("homeLoginForm").onsubmit = validate;

function validate() {
    let isValid = true;

    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++){
        errors[i].style.display = "none";
    }

    // Check username - Must not be empty, or 4 or less characters
    let username = document.getElementById("uname").value;
    if (username = "" /*!"/(?=.*[a-z]).{4,}/"*/) {
        let errUser = document.getElementById("err-user");
        errUser.style.display = "inline";
        isValid = false;
    }

    //Check password - Must not be empty, 8 or less characters, and must include a special character
    let password = document.getElementById("pass").value;
    if (password = "" /*!"/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/"*/){
        let errPass = document.getElementById("err-pass");
        errPass.style.display = "inline";

        isValid = false;
    }

    return isValid;
}

document.getElementById("pass").onclick = logPassVisible;

function logPassVisible() {
    let logPass = document.getElementById("pass");
    if (logPass.type === "password") {
        logPass.type = "text";
    } else {
        logPass.type = "password";
    }
}