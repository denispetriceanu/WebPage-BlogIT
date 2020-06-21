function register() {
    emailReg = $('#emailInputRegister').val();
    nameReg = $('#nameInputRegister').val();
    pass = $('#parolaInputRegister').val();
    passConfirm = $('#confirmPassword').val();

    var data = "username=" + nameReg + '&password=' + pass + '&email=' + emailReg;
    if (pass == passConfirm) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'Contul a fost creat!') {
                    window.location.replace("https://ie.usv.ro/~petriceanui/ExamenPro/login.html");
                    $('#showSuccessReg').show();
                    $('#showSuccessReg').text(this.responseText);
                    setTimeout(function () { $('#showSuccessReg').hide() }, 3000);
                } else {
                    $('#showErrorReg').show();
                    $('#showErrorReg').text(this.responseText);
                    setTimeout(function () { $('#showErrorReg').hide() }, 3000);
                }

            }
        };
        xmlhttp.open("POST", "php/register.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    } else {
        $('#showErrorReg').show();
        $('#showErrorReg').text("Parolele nu corespund");
        setTimeout(function () { $('#showErrorReg').hide() }, 3000);
    }
}

function login() {
    var user = $('#inputNameLogin').val();
    var pass = $('#inputPassLogin').val();
    check = $('#checkMyPo:checked').length;

    var data = "username=" + user + '&password=' + pass;
    if (check == 1) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'Success') {
                    window.location.replace("https://ie.usv.ro/~petriceanui/ExamenPro/?to=" + open);
                    $('#showSuccessLogin').show();
                    $('#showSuccessLogin').text(this.responseText);
                    setTimeout(function () { $('#showSuccessLogin').hide() }, 3000);
                    open = 0;
                } else {
                    $('#showErrorLogin').show();
                    $('#showErrorLogin').text(this.responseText);
                    setTimeout(function () { $('#showErrorLogin').hide() }, 3000);
                }
            }
        };
        xmlhttp.open("POST", "php/login.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    } else {
        $('#showErrorLogin').show();
        $('#showErrorLogin').text("Bifați că ați luat la cunoștință termenii și condițiile");
        setTimeout(function () { $('#showErrorLogin').hide() }, 3000);
    }
}


function registerByAdmin() {
    emailReg = $('#emailInputRegisterModal').val();
    nameReg = $('#nameInputRegisterModal').val();
    pass = $('#parolaInputRegisterModal').val();
    rol = $('#rolInputRegisterModal').val();
    passConfirm = $('#confirmPasswordModal').val();

    var data = "username=" + nameReg + '&password=' + pass + '&email=' + emailReg + '&rol=' + rol;
    console.log(data);
    if (pass == passConfirm) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'Contul a fost creat!') {
                    $('#showSuccessRegModal').show();
                    $('#showSuccessRegModal').text(this.responseText);
                    setTimeout(function () { $('#showSuccessReg').hide() }, 3000);
                } else {
                    $('#showErrorRegModal').show();
                    $('#showErrorRegModal').text(this.responseText);
                    setTimeout(function () { $('#showErrorReg').hide() }, 3000);
                }

            }
        };
        xmlhttp.open("POST", "php/register_by_admin.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    } else {
        $('#showErrorRegModal').show();
        $('#showErrorRegModal').text("Parolele nu corespund");
        setTimeout(function () { $('#showErrorReg').hide() }, 3000);
    }
}

function delete_user() {
    if (idUserForDelete != "") {
        var data = "id=" + idUserForDelete;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'Utilizator șters!') {
                    $('#showSuccessDeleteUser').show();
                    $('#showSuccessDeleteUser').text(this.responseText);
                    setTimeout(function () { $('#showSuccessDeleteUser').hide() }, 3000);
                    closeModalDeleteUser()
                } else {
                    $('#showErrorDeleteUser').show();
                    $('#showErrorDeleteUser').text(this.responseText);
                    setTimeout(function () { $('#showErrorDeleteUser').hide() }, 3000);
                    location.replace('https://ie.usv.ro/~petriceanui/ExamenPro/?to=2');
                }

            }
        };
        xmlhttp.open("POST", "php/delete_user.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    } else {
        $('#showSuccessDeleteUser').show();
        $('#showSuccessDeleteUser').text("Nu există un id setat");
        setTimeout(function () { $('#showSuccessDeleteUser').hide() }, 3000);
    }
}

function sendChangePass() {
    pass = $('#inputPassVecheChange').val();
    passNew = $('#inputPassNouChange').val();
    passConfirm = $('#inputPassConfirmChange').val();
    if (idForChangePass != "") {
        if (passConfirm == passNew) {
            var data = "id=" + idForChangePass + "&password=" + pass + "&newPass=" + passNew;
            console.log(data);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'Parolă modificată') {
                        $('#showSuccessChangePass').show();
                        $('#showSuccessChangePass').text(this.responseText);
                        setTimeout(function () { $('#showSuccessChangePass').hide() }, 3000);
                        closeModalChangePass();
                        resetFormChangePass();
                    } else {
                        $('#showErrorChangePass').show();
                        $('#showErrorChangePass').text(this.responseText);
                        setTimeout(function () { $('#showErrorChangePass').hide() }, 3000);
                    }

                }
            };
            xmlhttp.open("POST", "php/change_pass.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(data);
        } else {
            $('#showErrorChangePass').show();
            $('#showErrorChangePass').text("Parolele nu corespund");
            setTimeout(function () { $('#showErrorChangePass').hide() }, 3000);
        }
    } else {
        $('#showErrorChangePass').show();
        $('#showErrorChangePass').text("Nu există un id setat");
        setTimeout(function () { $('#showErrorReg').hide() }, 3000);
    }
}

function sendEditUser() {
    nume_vechi = numeInitial;
    nume = $('#nameEditUser').val();
    email = $('#emailEditUser').val();
    rol = $('#rolEditUser').val();
    pass = $('#passEditUser').val();

    if (numeInitial != "") {
        var data = "user_name=" + nume + "&password=" + pass + "&email=" + email + "&rol=" + rol + "&user_name_vechi=" + nume_vechi;
        console.log(data);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'Modificat cu succes') {
                    $('#showSuccessOnEdit').show();
                    $('#showSuccessOnEdit').text(this.responseText);
                    setTimeout(function () { $('#showSuccessOnEdit').hide() }, 3000);
                    closeModalEditUser();
                    location.replace('https://ie.usv.ro/~petriceanui/ExamenPro/?to=2');
                } else {
                    $('#showErrorOnEdit').show();
                    $('#showErrorOnEdit').text(this.responseText);
                    setTimeout(function () { $('#showErrorOnEdit').hide() }, 3000);
                }

            }
        };
        xmlhttp.open("POST", "php/edit_user_info.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    } else {
        $('#showErrorOnEdit').show();
        $('#showErrorOnEdit').text("Nu s-a preluat numele initial");
        setTimeout(function () { $('#showErrorReg').hide() }, 3000);
    }
}