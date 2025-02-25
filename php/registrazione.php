<?php 
	
	require_once "gestione_db.php";
	//Dati acquisiti: username/email/nome/cognome/data/password

	//Controlliamo se l'utente ha inserito i dati
	
	if ( ! (
		isset($_POST["username"]) 
	&& isset($_POST["password"]) 
	&& isset($_POST["email"])
	&& isset($_POST["nome"])
	&& isset($_POST["cognome"])
	&& isset($_POST["data"])
	) ){

		header("Location:../html/registrazione.html"); //Altrimenti lo rimandiamo alla schermata di registrazione
	} 
	
	
	//Controllo sulla lunghezza dei caratteri di ogni campo
	
	if ( ! ( 
		//Nickname massimo 16 caratteri minimo 3
		strlen($_POST["username"]) > 3 &&  strlen($_POST["username"]) < 16
		//Password minimo 3 caratteri e massimo 16
	&& strlen($_POST["password"]) > 3 && strlen($_POST["password"]) < 16
	&& strlen($_POST["email"]) > 0 && strlen($_POST["password"]) < 32
	&& strlen($_POST["cognome"]) > 0 && strlen($_POST["cognome"]) < 16
	) ) header("Location:../html/registrazione.html");
		
	//Filtriamo i valori e ci prepariamo le variabili corrispondenti
	

	@$username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_STRING);
	@$password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_STRING);
	//@$password = crypt($password,0);
	@$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
	@$cognome = filter_input(INPUT_POST,"cognome", FILTER_SANITIZE_STRING);
	@$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
	@$date = $_POST["data"];

	//echo "Username $username\nPassword $password\nEmail $email\nCognome $cognome\nNome $nome\nData $date";
	
	/*
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$cognome = $_POST["cognome"];
	$nome = $_POST["nome"];
	$date = $_POST["data"];
	*/


	//Nel caso in cui i dati sono settati, prepariamo al query che lì inserisce nel database
	$query = "INSERT INTO utente
	VALUES (
		'$username',
		'$password',
		'$email',
		'$nome',
		'$cognome',
		'$date'
	)";

	$databaseOBJ = new GestioneDB("localhost:3306", "root", "", "area_progetto");
	
	@$databaseOBJ->queryQL($query);
	//Controlliamo se ci sono stati errori nella query
	//Se si rimandiamo al form di registrazione

	if ( $databaseOBJ->checkErrors() ) header("Location:../html/registrazione.html"); //Altrimenti lo rimandiamo alla schermata di registrazione
	
	
	@$databaseOBJ->closeDB();
	
	@session_start();									
    $_SESSION["login"] = true;
	
	
	//Dopo la registrazione passiamo alla homepage
	header("Location:../index.html");

?>