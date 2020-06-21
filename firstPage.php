<?php
session_start();
?>
<div id="textInitial" style="height: auto; margin-top: 20px; margin-bottom: 50px;">
    <!-- just to make scrolling effect possible -->

    <?php
    if (!isset($_SESSION['logat'])) {
        echo    '<h2 class="myH2" style="margin-bottom: 20px;">Te întrebi ce este asta, poate?</h2>';
    } else {
        echo    '<h2 class="myH2" style="margin-bottom: 20px;">Salut ' . $_SESSION['nume'] . '. Bine ai revenit!</h2>';
    }
    ?>
    <p class="myP"><span style="margin-left:0px;">Ceea</span> ce vezi aici este un nou și inovativ blog care aduce o multitudine de informații
        noi.</p>
    <p class="myP">Cine suntem noi? Suntem o echipă tânără care încă își dorește să-și mărească numărul, deci hai la
        noi în echipă</p>
    <?php
    if (!isset($_SESSION['logat'])) {
        echo    '<p class="myP" onclick="change(5)">APASĂ AICI PENTRU A-ȚI FACE CONT!</p>';
    }
    ?>
    <p class="myP">Îti va plăcea, promitem noi, cei care suntem deja aici!</p>
    <p class="myP">
        Cel mai mare avantaj pe care îl aducem noi față de celelalte bloguri este acela că suntem ca o familie. Pe langă
        faptul ca am încercat sa construim această platformă cu scopul de ați usura munca, aici nu punem accent pe felul
        în care colorezi scrisul sau ce emoticoane pui.
        Aici încercăm să lăsăm frumusețea ordinii cuvintelor să se facă simțită și apreciată.
        Practic de fiecare dată când ai chef să scrii ceva sau să citești ceva poți veni aici.
    </p>
</div>