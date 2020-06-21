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

$sql = "SELECT * FROM `denis_utilizatori` WHERE id = " . $id;

$result = $link->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<form class="px-4 py-3">
                <label for="nameDropDown" class="info" style="font-size:15px">Nume</label>
                <input type="email" class="form-control myInput" id="nameDropDown" style="font-size:13px; margin-top: -28px!important; border-radius: 9px" placeholder="Nume" value="' . $row['user_name'] . '" readonly="readonly">
                <label for="emailDropDown" class="info" style="font-size:15px">Email</label>
                <input type="email" class="form-control myInput" id="emailDropDown" style="font-size:13px; margin-top: -28px!important; border-radius: 9px" placeholder="email@example.com" value="' . $row['email'] . '" readonly="readonly">
                <label for="rolDropDown" class="info" style="font-size:15px" >Rol</label>
                <input type="email" class="form-control myInput" id="rolDropDown" style="font-size:13px; margin-top: -28px!important; border-radius: 9px" placeholder="ADMIN" value="' . $row['rol'] . '" readonly="readonly">
            </form>';
    }
} else {
    echo 'Nu am gasit nici un user</br>' . $sql ;
}
