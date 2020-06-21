<?php

include('database_info.php');

$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    exit;
}

if (!isset($_POST['id'], $_POST['password'], $_POST['newPass'])) {
    die('Nu s-au trimis datele in formatul corect');
}

$id = $_POST['id'];

if (isset($_POST['id'])) {
    if ($stmt = $link->prepare('SELECT id, password FROM denis_utilizatori WHERE id = ?')) {
        $stmt->bind_param('s', $_POST['id']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();

            $parola_veche = md5($_POST['password']);
            $parola_noua = md5($_POST['newPass']);
            if ($parola_veche == $password) {
                $query = "UPDATE denis_utilizatori SET  password ='" . $parola_noua . "' WHERE id=" . $id;
                if (mysqli_query($link, $query)) {
                    echo 'Parolă modificată';
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
