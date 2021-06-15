<?php

//Return true if the username is valid
function validUser($username)
{
    return strlen(trim($username)) >= 4;
}

//Return true if the password is valid
function validPass($password)
{
    $upper = preg_match('@[A-Z]@', $password);
    $lower = preg_match('@[a-z]@', $password);
    $num   = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$upper || !$lower || !$num || !$specialChars || strlen($password) < 8) {
        return false;
    } else {
        return true;
    }

}