<?php

session_start();

if (count($_POST) != 2) {
    header('Location: ../');
    exit();
}

$_SESSION['fighters'] = [];

foreach ($_POST as $characterType) {
    array_push($_SESSION['fighters'], $characterType);
}

$_SESSION['fighting'] = true;
header('Location: ../');
exit();
