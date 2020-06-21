// <!-- functie pentru a aparea negru sub navbar -->
var myLocation = 'home';
var open;
var idUserForDelete;
var idForChangePass;
var numeInitial;
// var pentru a redirectiona dupa logare

listOfPage = ["firstPage.php", "postBlog.php", "adminUsers.php", "contact.html", "login.html", "register.html", "showBlog.html"]

$(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
        $('.nav').addClass('affix');
    } else if ($(document).scrollTop() < 50 && myLocation == "home") {
        $('nav').removeClass('affix');
    }
});

// functie care modifica clasa in functie de ce pagina aleg
$.fn.design = function (params) {
    if (params == 1) {
        myLocation = 'everywhere'
        $('.nav').addClass('affix');
    } else {
        myLocation = 'home'
        $('.nav').removeClass('affix');
    }
}
//  functie care schimba pagina, aceasta apeleaza si functia incarca();
function change(id) {
    incarca(listOfPage[id]);
    if (id == 0) {
        $.fn.design(0);
        document.getElementById("niceImage").style = "display: block";
    } else {
        $.fn.design(1);
        document.getElementById("niceImage").style = "display: none";
        document.getElementById("content").style = "padding-top: 62px;";
    }
};

function incarca(filename) {
    // selectez pagina
    req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('content').innerHTML = req.responseText;
        }
    }
    req.open('GET', filename, true);
    req.send();
}

// functie care scrie copyright;
function copyright() {
    document.write('&copy;');
    document.write(' Denis Petriceanu');
    document.write('  2020 - ');
    document.write(new Date().getFullYear());
}

// functie care verifica emailul
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// functie care verifica parola
function validatePass(pwd) {
    re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/
    return re.test(String(pwd))
}

// functia care deschide modalul pentru login, id=este locatia unde se doreste sa se navigheze
function openModal(id) {
    open = id;
    $('#myModal').show();
}

function closeModal() {
    console.log("S-a apelat");
    $('#myModal').hide();
}

function refreshPage() {
    location.reload();
}

function openModalDeleteUser(id) {
    idUserForDelete = id;
    getDataAboutUser(id);
    $('#modalDeleteUser').show();
}

function closeModalDeleteUser() {
    $('#modalDeleteUser').hide();
}

function openModalChangePass(id) {
    idForChangePass = id;
    $('#modalChangePass').show();
}

function closeModalChangePass() {
    $('#modalChangePass').hide();
}

function openModalEditUser(id) {
    console.log("ne-am apelat");
    $('#modalEditUser').show();
    getFormEditUser(id);
}

function closeModalEditUser() {
    $('#modalEditUser').hide();
}

function closeMyCookie(){
    $('#clasCookie').hide();
}