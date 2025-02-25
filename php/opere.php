<?php 

//Prima di visualizzare la pagina, controlliamo che l'utente sia loggato tramite il metodo delle sessioni
    //session_start();
    //Se l'utente non è loggato, quindi la variabile "login" nell'array associativo è falsa, o non inizializzata
    //lo rimandiamo alla pagina del login
    @session_start();
    if( ! isset($_SESSION["login"]) ) header("Location:../html/login.html"); 

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Opere</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/styleOpere.css">
        <link href='https://fonts.googleapis.com/css?family=Hind Siliguri' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
        <script src="https://kit.fontawesome.com/0d19d0ba32.js" crossorigin="anonymous"></script>
    </head>
    <body> 
        <section class="header">
            <nav>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="../index.html">&#8592; Torna alla home</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>

            <div class="container-opere">
                
                <?php

                require_once("gestione_db.php");
                //Accesso al db
                $databaseOBJ = new GestioneDB("localhost:3306", "root", "", "area_progetto");
                //Query opera
                $query = "
                SELECT *
                FROM opera
                ";
                
                $databaseOBJ->queryQL($query);
                $databaseOBJ->fetchOpera();
                $databaseOBJ->closeDB();
                
                ?>
            </div>

        </section>

        <script>
            var navLinks=document.getElementById("navLinks");
    
            function showMenu(){
                navLinks.style.right="0";
            }
    
            function hideMenu(){
                navLinks.style.right="-200px";
            }
    
        </script>
    </body> 
</html>