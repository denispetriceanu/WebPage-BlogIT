<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Blogit = bloguri -->
    <title>BlogIT</title>
    <link rel="stylesheet" href="CSS/modal.css">

    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="js/scripts.js"></script> -->

    <!-- CSS -->
    <!-- Index -->
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/cookie.css">

    <!-- PostBlog -->
    <link rel="stylesheet" href="CSS/postBlog.css">
    <link rel="stylesheet" href="CSS/showBlog.css">

    <!-- Admin Users -->
    <link rel="stylesheet" href="CSS/admiUser.css">
    <!-- <link rel="stylesheet" href="CSS/modalRegister.css"> -->

    <!-- Contact -->
    <link rel="stylesheet" href="CSS/contact.css">

    <!-- Login -->
    <link rel="stylesheet" href="CSS/login.css">

    <!-- register -->
    <link rel="stylesheet" href="CSS/register.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Boostrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="JS/main.js"></script>
    <script src="JS/login&register.js"></script>
    <script src="JS/info.js"></script>
    <script src="JS/function_blog.js"></script>

    <style>
        a {
            color: white;
            font-size: 18px;
            margin-right: 20px;
        }

        a:hover {
            color: red !important;
            FONT-WEIGHT: 500;
        }

        #formdropdown {
            margin-top: -15px;
            min-width: 40%;
            margin-left: -90%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg nav fixed-top" id="navigatie">
        <div class="container">
            <a href="javascript:void(0)" onclick="change(0)"><img src="images/logo.png" alt="Logo" width="70px" height="70px"></a>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" onclick="change(0)">Acasă</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" onclick="change(6)">Bloguri</a>
                        </li>
                        <?php
                        if (isset($_SESSION['logat'])) {
                            echo '<li class="nav-item ">
                                    <a class="nav-link" href="javascript:void(0)" onclick="change(1)">Crează blog</a>
                                </li>';
                        } else {
                            echo '<li class="nav-item ">
                                     <a class="nav-link" href="javascript:void(0)" onclick="openModal(1)">Crează blog</a>
                            </li>';
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['logat'])) {
                            if ($_SESSION['rol'] == 'ADMIN') {
                                echo '<li class="nav-item ">
                                <a class="nav-link" href="javascript:void(0)" onclick="change(2)">Admin utilizatori</a>
                            </li>';
                            } else {
                                echo '<li class="nav-item ">
                                <a class="nav-link" href="javascript:void(0)" onclick="openModal(2)">Admin utilizatori</a>
                            </li>';
                            }
                        } else {
                            echo '<li class="nav-item ">
                                <a class="nav-link" href="javascript:void(0)" onclick="openModal(2)">Admin utilizatori</a>
                            </li>';
                        }
                        ?>
                        <script>
                            function test(id) {
                                console.log('AM fost apela ' + id);
                                getDataAboutUser(id);
                            }
                        </script>
                        <?php
                        if (isset($_SESSION['logat'])) {
                            if ($_SESSION['logat'] == true) {
                                echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" onclick="test(' . $_SESSION['id'] . ')" aria-haspopup="true" aria-expanded="false">&#128522;
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="formdropdown" style="width:300px">
                                <div id="infoDropDown"></div>';

                                echo '<div class="dropdown-divider"></div><a class="dropdown-item" id="delogheazaDropdown" style="color: blue!important; font-size: 11px;
                                        height: 50px;" href="php/logout.php">Deloghează-te</a>';
                                echo '</div></li>';
                            }
                        }
                        ?>
                        <?php
                        if (!isset($_SESSION['logat'])) {
                            echo    '<li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link" onclick="openModal(0)">Loghează-te</a>
                                    </li>';
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" onclick="change(3)">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="home" id="niceImage">
    </section>

    <div id="clasCookie" style="display: block">
        <!-- <div id="xCookie" onclick="hideCookie()">x</div> -->
        Acest site folosește cookie, <a href="#" target="_blank">apasă aici pentru mai multe detalii</a>. 
        <button class="btn btn-success myButonCookie" style="float: right;">Am înțeles</button>
        <button class="btn btn-secondary myButonCookie" style="float: right;width: 107px;height: 23px;margin-top: 1px;" onclick="closeMyCookie()">Nu sunt de acord</button>
    </div>

    <div id="content">
    </div>

    <div class="footer">
        <script>
            copyright()
        </script>
    </div>








    <div id="myModal" style="display: none;">
        <div class="modal-content" style="width: 40%; margin-right:auto; margin-left:auto">
            <div id="modal-header" style="text-align: right;">
                <span id="closeX" style="cursor: pointer;" onclick="closeModal()">&times;</span>
                <h1 style="text-align: center; color: #002e63;">Formular de logare</h1>
            </div>
            <div class="modal-body">
                <div class="form-signin">
                    <input type="text" class="form-control mb-2" placeholder="Email" style="font-size: 20px;" id="inputNameLogin" required autofocus>
                    <input type="password" class="form-control mb-2" id="inputPassLogin" placeholder="Password" style="font-size: 20px;" required>
                    <label class="checkbox float-left" style="font-size: 15px;">
                        <input type="checkbox" value="remember-me" id="checkMyPo">
                        Sunt de acord cu termenii și conțiile.<a href="www.google.ro" style="color:rgb(73, 73, 201); font-size: 12px; padding-top:3px;"> Mai multe
                            informații</a>
                    </label>
                    <button class="btn btn-lg btn-primary btn-block mb-1" type="button" id="trimite" onclick="login()">Sign in</button>
                    <label class="checkbox float-left" style="font-size: 15px;">
                        <div class="alert alert-danger" id="showErrorLogin" style="display: none;"></div>
                        <div class="alert alert-success" id="showSuccessLogin" style="display: none;"></div>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="float-right" onclick="change(5)" style="color:rgb(73, 73, 201)">Crează-ți cont!</a>
            </div>
        </div>
    </div>

    <?php
    // echo '<script>alert("' . $_SESSION['rol'] . '")</script>';
    if (isset($_GET['to'])) {
        $vari = $_GET['to'];
        if ($vari == 2) {
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol'] == 'ADMIN') {
                    echo    "<script>
                                change(" . $vari . ")
                            </script>";
                } else {
                    echo    "<script>
                                alert('Ai încercat să accesezi o pagină destinată administratorilor. Veți fi redirecționat către prima pagină')
                                window.location.href='https://ie.usv.ro/~petriceanui/ExamenPro/';
                            </script>";
                }
            }
        } else {
            if ($vari == 3) {
                echo    "<script>
                            change(" . $vari . ")
                        </script>";
            } else if (isset($_SESSION['logat'])) {
                echo    "<script>
                            change(" . $vari . ")
                        </script>";
            } else {
                echo    "<script>
                            change(0)
                        </script>";
            }
        }
    }
    ?>

</body>

</html>