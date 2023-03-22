<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!isset($_SESSION['game'])) {
        $_SESSION['game']['player1Name'] = $_POST['p1'];
        $_SESSION['game']['player2Name'] = $_POST['p2'];
        $_SESSION['game']['player1Points'] = 0;
        $_SESSION['game']['player2Points'] = 0;
        $_SESSION['game']['turn'] = 0;
        $player = $_SESSION['game']['player1Name'];
    }

    if (isset($_POST['metimas'])) {
        if ($_SESSION['game']['turn']) {
            $_SESSION['game']['turn'] = 0;
            $player = $_SESSION['game']['player1Name'];
            $_SESSION['game']['player2Points'] += rand(1, 6);
        } else {
            $_SESSION['game']['turn'] = 1;
            $player = $_SESSION['game']['player2Name'];
            $_SESSION['game']['player1Points'] += rand(1, 6);
        }
    }

    if ($_SESSION['game']['player1Points'] >= 10 || $_SESSION['game']['player2Points'] >= 10) {
        if ($_SESSION['game']['player1Points'] >= 10) {
            echo "Laimėjo " .  $_SESSION['game']['player1Name'];
        } else {
            echo "Laimėjo " .  $_SESSION['game']['player2Name'];
        }
        unset($_SESSION['game']);
    }



    // print_r($_SESSION);
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_SESSION['game'])) {
        if ($_SESSION['game']['turn']) {
            $player = $_SESSION['game']['player2Name'];
        }else{
            $player = $_SESSION['game']['player1Name'];
        }

    }
}

$cars = array (
    array("Volvo",22),
    array("BMW",15),
    array("Saab",5),
    array("BMW",15),
    array("Land Rover",17)
  );
// sukurtumėte puslapį "pirkinių sąrašas"
// make it nice
// puslapyje turi būti duomenų suvedimo forma su dviem laukeliais. pirkinys ir kategorija. Forma = POST
// įvestus duomenis saugokite sesijoje. $_SESSION['shop'][] = ['item' => 'obuoliai', 'category' => 'fruits'];
// atvaizduoti prekių sąrašą.
// jei prekių nėra - turi nemesti erorų. ir šiaip. JOKIŲ ERORRŲ! =)
// atvaizduojame duomenis table