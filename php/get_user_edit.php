<?php
include('database_info.php');
$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_errno() . PHP_EOL . "</br>";
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</br>";
    exit;
}

$id = $_POST['id'];
$sql = "SELECT * FROM denis_utilizatori WHERE id = " . $id . "";

$result = mysqli_query($link, $sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="form-group">
            <label for="nameInputEdit">Nume</label>
            <input type="email" class="form-control" id="nameEditUser" value="' . $row["user_name"] . '">
        </div>';
        echo '<div class="form-group">
            <label for="inputEmail1Edit">Email</label>
            <input type="email" class="form-control" id="emailEditUser" aria-describedby="emailHelp" value="' . $row["email"] . '">
        </div>';
        echo '<div class="form-group">
            <label for="inputRolEdit">Rol</label>
            <input type="email" class="form-control" id="rolEditUser" aria-describedby="rolHelp" value="' . $row["rol"] . '">
            <small id="rolHelp" class="form-text text-muted">Rolul pe care îl va avea utilizatorul, ADMIN sau USER.</small>
        </div>';
        echo '<div class="form-group">
            <label for="inputPassword1Edit">Parolă</label>
            <input type="password" class="form-control" id="passEditUser" style="font-size: 10px!important;">
            <small id="emailHelp" class="form-text text-muted">Parola pe care o introduceți trebuie să fie
                din minim 6 caractere, să conțină minim o literă mare și minim o cifră</small>
        </div>';
        echo '</div>';
        echo '<div id="showErrorOnEdit" class="alert alert-danger" style="display:none"></div>';
        echo '<div id="showSuccessOnEdit" class="alert alert-success" style="display:none"></div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModalEditUser()">Close</button>';
        echo '<button type="button" class="btn btn-primary" onclick="sendEditUser()">Save changes</button>';
        echo '</div>';
    }
} else {
    echo "Ceva nu a mers bine";
}
mysqli_close($con);
