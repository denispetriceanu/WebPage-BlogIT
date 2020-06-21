<?php
session_start();
include("database_info.php");

$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL;
    exit;
}

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    die('Please fill both the username and password field!');
}

$sql_create = "CREATE TABLE denis_utilizatori(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(30) NOT NULL,
    password VARCHAR(32) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    rol VARCHAR(70) NOT NULL DEFAULT 'ADMIN' 
)";


$user_name = $_REQUEST['username'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
// $rol = $_REQUEST['rol'];

// Validarea parolei
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
// $specialChars = preg_match('@[^\w]@', $password);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Formatul emailului este invalid");
}

if (strlen($user_name) < 3) {
    die("Numele este prea scurt");
}

if (!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
    die('Parola trebuie să conțină minim 6 caractere, cel puțin o literă mare și una mică');
}
// criptarea parolei
$cod_passw = md5($password);
// interogare de insert
$sql_insert = "INSERT INTO denis_utilizatori (user_name, password, email) VALUES ('$user_name', '$cod_passw', '$email')";
// interogare verificare if exista bd
$val = mysqli_query($link, 'select 1 from `denis_utilizatori`');

if ($val !== FALSE) {
    // print("Exists </br>");
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
        echo "Contul a fost creat!";
    } else {
        echo "ERROR: nu s-a putu executa urmatoarea interogare: $sql_query. " . mysqli_error($_link);
    }
}
