function getDataAboutUser(id) {
    if (id != "") {
        var data = "id=" + id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                $('#infoDropDown').html(this.responseText);
                $('#infoDeleteUser').html(this.responseText);
            }
        };
        xmlhttp.open("POST", "php/get_info_user.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    } else {
        $('#infoDropDown').show();
        $('#infoDropDown').text("Nu există un id setat");
    }
}

function resetFormChangePass() {
    $('#inputPassVecheChange').val("");
    $('#inputPassNouChange').val("");
    $('#inputPassConfirmChange').val("");
}

function getFormEditUser(id) {
    if (id != "") {
        var data = "id=" + id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                $('#formEditUser').html(this.responseText);
                getNameForEdit();
            }
        };
        xmlhttp.open("POST", "php/get_user_edit.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    } else {
        $('#errorOnEdit').show();
        $('#errorOnEdit').text("Nu există un id setat");
    }
}

function getNameForEdit() {
    numeInitial = $('#nameEditUser').val();
    console.log(numeInitial);
}


function sendMessageContact() {
    nameMessage = $('#nameToContact').val();
    emailMessage = $('#emailToContact').val();
    messageMessage = $('#messageToContact').val();

    if (nameMessage != "") {
        if (emailMessage != "") {
            if (messageMessage != "") {
                var data = "user_name=" + nameMessage + "&email=" + emailMessage + "&message=" + messageMessage;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'Mesaj trimis') {
                            $('#showSuccessContact').show();
                            $('#showSuccessContact').html(this.responseText);
                            setInterval(function () { $('#showSuccessContact').hide(); }, 3000)
                            clearFormContact();
                        }
                        $('#showErrorContact').val(this.responseText);
                    }
                };
                xmlhttp.open("POST", "php/post_contact.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(data);
            } else {
                $('#showErrorContact').show();
                $('#showErrorContact').val('Completează câmpul mesaj');
                setInterval(function () { $('#showErrorContact').hide(); }, 3000)

            }
        } else {
            $('#showErrorContact').show();
            $('#showErrorContact').val('Completează câmpul email');
            setInterval(function () { $('#showErrorContact').hide(); }, 3000)

        }
    } else {
        $('#showErrorContact').show();
        $('#showErrorContact').val('Completează câmpul nume');
        setInterval(function () { $('#showErrorContact').hide(); }, 3000)
    }
}

function clearFormContact() {
    $('#nameToContact').text("");
    $('#emailToContact').text("");
    $('#messageToContact').text("");
}