<?php 

//Prima di visualizzare la pagina, controlliamo che l'utente sia loggato tramite il metodo delle sessioni
    
    //Se l'utente non è loggato, quindi la variabile "login" nell'array associativo è falsa, o non inizializzata
    //lo rimandiamo alla pagina del login

    //Controlliamo lo stato della sessione, poichè se passiamo da php a php questa è già aperta
    
    @session_start();
    if( ! isset($_SESSION["login"]) ) header("Location:../html/login.html"); 

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Virtual-Tour</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/styleHome.css">
        <link href='https://fonts.googleapis.com/css?family=Hind Siliguri' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
        <script src="https://kit.fontawesome.com/0d19d0ba32.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleVirtualTour.css" />
    </head>
    <body> 
        <section class="header">
            <nav>
                <a href="../index.html"><img src="../img/logo.png" draggable="false"></a>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    
                    <ul>
                        <li><a href="../index.html">&#8592; Torna alla home</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>

            <!-- Script per la barra laterale -->
            <script type="text/javascript" src="../js/script-nav-bar.js"></script>
        
            <div id="panorama"></div>
            <script src="../js/virtual-tour.js"></script>
        </section>
    </body>
</html>