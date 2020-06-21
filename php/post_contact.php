<?php
session_start();
include("database_info.php");

$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL;
    exit;
}

if (!isset($_POST['user_name'], $_POST['message'], $_POST['email'])) {
    die('Please fill both the username and password field!');
}

$sql_create = "CREATE TABLE denis_contact(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(30) NOT NULL,
    mesaj VARCHAR(200) NOT NULL,
    email VARCHAR(70) NOT NULL
)";


$user_name = $_POST['user_name'];
$mesaj = $_POST['message'];
$email = $_POST['email'];

// interogare de insert
$sql_insert = "INSERT INTO denis_contact (user_name, mesaj, email) VALUES ('$user_name', '$mesaj', '$email')";

// interogare verificare if exista bd
$val = mysqli_query($link, 'select 1 from `denis_contact`');

if ($val !== FALSE) {
    insertUser($link, $sql_insert);
} else {
    print("Doesn't exist" . "</br>");
    if (mysqli_query($link, $sql_create)) {
        echo "Table created successfully." . "</br>";
        insertUser($link, $sql_insert);
    } else {
        echo "ERROR: nu s-a putu executa urmatoarea interogare: $sql. " . mysqli_error($link) . "</br>";
    }
}

function insertUser($_link, $sql_query)
{
    if (mysqli_query($_link, $sql_query)) {
        echo "Mesaj trimis";
    } else {
        echo "ERROR: nu s-a putut executa urmatoarea interogare: $sql_query. " . mysqli_error($_link);
    }
}
