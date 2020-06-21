<?php
include('database_info.php');
session_start();
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL;
    exit;
}

if (!isset($_POST['username'], $_POST['password'])) {
    die('Nu am primit datele necesare logarii');
}

// se previne injectia
if ($stmt = $con->prepare('SELECT rol, password, email, id FROM denis_utilizatori WHERE user_name = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // salvam rezultatul si il verificam in BD
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($rol, $password, $email, $id);
        $stmt->fetch();
        $receive = md5($_POST['password']);

        if ($receive === $password) {
            session_regenerate_id();
            $_SESSION['logat'] = TRUE;
            $_SESSION['nume'] = $_POST['username'];
            $_SESSION['rol'] = $rol;
            $_SESSION['id'] = $id;
            // header("Location: https://ie.usv.ro/~petriceanui/ExamenPro/");
            echo 'Success';
        } else {
            echo 'Parolă incorectă';
        }
    } else {
        echo 'Nume utilizator inexistent';
    }
    $stmt->close();
}
