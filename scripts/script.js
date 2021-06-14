document.getElementById("loginForm").onsubmit = validate;

function validate() {
    let isValid = true;

    let errors = document.getElementsByClassName("err");
    for (let i =0; i<errors.length;i++){
        errors[i].style.display = "none";
    }

    //check username
    let username = document.getElementById("uname").value;
    if (username == "") {//username must not be an empty string
        let errUserEmpty = document.getElementById("err-user-empty");
        errUserEmpty.style.display = "inline";
        isValid = false;
    } else if (username.length <= 4) { //username must be greater than or equal to 4 chars
        let errUserLength = document.getElementById("err-user-length");
        errUserLength.style.display = "inline";
        isValid = false;
    }

    return isValid;
}