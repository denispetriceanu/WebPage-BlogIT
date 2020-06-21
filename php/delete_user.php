<?php

include('database_info.php');

$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_errno() . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</br>";
    exit;
}

if (!isset($_POST['id'])) {
    die('Please complete yput data');
}

$id = $_REQUEST['id'];

$sql_remove = "DELETE FROM `denis_utilizatori` WHERE id = " . $id;

if ($val !== FALSE) {
    delete_user($link, $sql_remove);
}

function delete_user($_link, $sql_query)
{
    if (mysqli_query($_link, $sql_query)) {
        echo "Utilizator șters!";
    } else {
        echo "ERROR: nu este posibila excutia interogarii: $sql_query. " . mysqli_error($_link);
    }
}
