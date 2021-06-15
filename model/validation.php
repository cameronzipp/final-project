<?php

//Return true if the username is valid
/**
 * Checks whether a inputted username is valid on the server
 * @param $username User inputted username
 * @return bool true if username is valid, false otherwise
 */
function validUser($username)
{
    return strlen(trim($username)) >= 4;
}

//Return true if the password is valid
/**
 * Checks whether a inputted password is valid on the server
 * @param $password User inputted password
 * @return bool true if password is valid, false otherwise
 */
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