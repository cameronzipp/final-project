<?php
require ($_SERVER["DOCUMENT_ROOT"] . '/../db.php');
$catNav = $pdo->query('SELECT * FROM Category');
echo json_encode($catNav->fetchAll());
