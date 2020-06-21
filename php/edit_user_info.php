<?php

include('database_info.php');

$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    exit;
}

if (!isset($_POST['user_name'], $_POST['password'], $_POST['email'], $_POST['rol'], $_POST['user_name_vechi'])) {
    die('Nu s-au trimis datele in formatul corect');
}

$id = $_POST['id'];
$rol = strtoupper($_POST['rol']);
if (isset($_POST['user_name_vechi'])) {
    if ($stmt = $link->prepare('SELECT password, id FROM denis_utilizatori WHERE user_name = ?')) {
        $stmt->bind_param('s', $_POST['user_name_vechi']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($password, $id);
            $stmt->fetch();

            $parola = md5($_POST['password']);
            if ($parola == $password) {
                $query = "UPDATE denis_utilizatori SET user_name='" . $_POST['user_name'] . "', password ='" . $parola . "', email='" . $_POST['email'] . "', rol='" . $rol . "' WHERE id=" . $id;
                if (mysqli_query($link, $query)) {
                    echo 'Modificat cu succes';
                } else {
                    echo $query;
                    echo "Modificarea datelor nu a avut loc";
                }
            } else {
                echo 'Parola incorecta!';
            }
        } else {
            echo 'ID-ul a fost trimis incorect';
        }
    } else {
        echo $stmt;
    }
}

$stmt->close();
