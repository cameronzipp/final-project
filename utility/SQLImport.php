<?php

require_once($_SERVER['HOME'] . "/db.php");

function importSQL($pathToFile, $DatabaseName = "default")
{
    //constants
    $dashComment = "--";
    $slashComment = "//";
    $slashStarComment = "/*";
    $endQuery = ";";

    $fullFile = file($pathToFile);
    $query = '';

    foreach ($fullFile as $line) {
        $lineStart = substr(trim($line), 0, 2);
        $lineEnd = substr(trim($line), -1, 1);

        if (empty($line) || $lineStart == $dashComment || $lineStart == $slashComment || $lineStart == $slashStarComment) {
            continue;
        }

        $query .= $line;
        if ($lineEnd == $endQuery){
            //insert sqli command here
            $query= '';
        }
    }
}