<?php
    
    require_once "gestione_db.php";

    $databaseOBJ = new GestioneDB("localhost:3306", "root", "", "area_progetto");
    //Controlliamo se ha inserito i dati
    if ( ! ( isset($_POST["username"]) && isset($_POST["password"]) ) ) header("Location:../html/login.html");
    
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    //Crittografiamo la password
    //$password = crypt($_POST["password"],0);

    $query = "
    SELECT *
    FROM utente
    WHERE username = '$username' AND passwd = '$password'
    ";
    //echo "Usernamme $username\n Password $password";
    @$login = $databaseOBJ->queryLogin($query);
    //echo $login;


    //Login non avvenuto con successo, redirecting alla login page
    if ( ! $login ) header("Location: ../html/login.html");
    
    @$databaseOBJ->closeDB();
    
    @session_start();
    $_SESSION["login"] = true;

    header("Location:../index.html");


?>