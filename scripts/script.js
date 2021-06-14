document.getElementById("loginForm").onsubmit = validate;

function validate() {
    let isValid = true;

    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++){
        errors[i].style.display = "none";
    }

    /*
    Check username
    Must not be empty, or 4 or less characters
     */
    let username = document.getElementById("uname").value;
    if (username == "" || username.length <= 4) {
        let errUser = document.getElementById("err-user");
        errUser.style.display = "inline";
        isValid = false;
    }

    /*
    Check password
    Must not be empty, 8 or less characters, and must include a special character
     */
    let password = document.getElementById("pass").value;
    if (password == "" || password.length <= 8 || !password.contains("@") || !password.contains("!") ||
        !password.contains("%")|| !password.contains("#") || !password.contains("$") ||
        !password.contains("*") || !password.contains("?")) {
        let errPass = document.getElementById("err-pass");
        errPass.style.display = "inline";

        isValid = false;
    }

    return isValid;
}