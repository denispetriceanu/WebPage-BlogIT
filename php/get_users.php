<?php
include('database_info.php');
session_start();
$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_errno() . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</br>";
    exit;
}
$sql = "SELECT * FROM denis_utilizatori";

$result = $link->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . $row["id"] . "</td>" . "<td>" . $row["user_name"] . "</td>" . "<td>" . $row["email"] . "</td>" . "<td>" . $row["rol"] . "</td>" .
            '<td class="buttonInTable" style="display: flex;
            justify-content: space-around;">';;
        if ($_SESSION['nume'] == $row['user_name']) {
            echo '<button class="btn btn-danger" onclick="openModalDeleteUser(' . $row["id"] . ')" disabled>Sterge</button>';
        } else {
            echo '<button class="btn btn-danger" onclick="openModalDeleteUser(' . $row["id"] . ')" >Sterge</button>';
        }
        echo '<button class="btn btn-info" onclick="openModalEditUser(' . $row["id"] . ')">Editeaza</button>
        <button class="btn btn-warning" onclick="openModalChangePass(' . $row["id"] . ')">Schimbă parola</button>
        </td>';
    }
} else {
    echo "Nu avem nici un utilizator";
}
$link->close();
