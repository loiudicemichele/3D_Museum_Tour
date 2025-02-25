<?php

    
    class GestioneDB{

        private $connection;    //Istanza classe mysqli
        private $result;     //Istanza classe msqli_result
        private $error_flag = false;

        function __construct($hostname, $username, $password, $nomeDB){

            try {
                //Inizializziamo l'oggetto msqli $connection, che conterrà la connessione al nostro db 
                $this->connection = new mysqli($hostname, $username, $password, $nomeDB);
                
                //Se errno = true, errore nella connessione; scatta l'eccezione
                if(  $this->connection->errno ) throw new Exception("Connessione fallita!");
                
                
            }
            catch(Exception $error){
                
                $this->error_flag = true;
                //die("ERRORE: " . $error->getMessage() . " con codice: " . $error->getCode());
                
            }

        }

        function queryQL( $query ){

            try{
                //Settiamo il valore result della classe con i parametri di ritorno della query
                $this->result = $this->connection->query($query);
                //Se il ritorno è nullo, la query ha generato un errore, scatta l'eccezione
                if ( $this->result == null ) throw new Exception("La query ha restituito un valore nullo!");

            }
            catch( Exception $error ){

                $this->error_flag = true;
                //die("ERRORE DEL PROGRAMMA: " . $error->getMessage());
                
            }

            
    
        }  

        function fetchOpera(){
            
            while( $row = $this->result->fetch_array() ){
                
                @$titolo = $row["titolo"];
                @$immagine = $row["immagine"];
                @$autore = $row["autore"];
                @$dimensioni = $row["dimensioni"];
                @$data_pub = $row["data_pub"];
                @$audio_it = $row["audio_it"];
                @$audio_eng = $row["audio_eng"];
                @$id_opera = $row["id_opera"];
                
                echo "<div class=\"item-opera\" id=\"$id_opera\">";
                echo "        <figure class=\"container-card\">";
                echo "            <img id=\"id_img_1\" src=\"../img/$immagine\" alt=\"\" />";
                echo "            <figcaption>";
                echo "                <h3 id=\"id_titolo_1\">".addslashes($titolo)."</h3><br>";
                echo "            <p id=\"id_autore_1\">Autore: $autore.</p>";
                echo "            <p id=\"id_dimensioni_1\"> Dimensioni: $dimensioni.</p>";
                echo "            <p id=\"id_anno_1\"> Anno: $data_pub</p>";
                echo "                    <p>Audio Italiano:</p>";
                echo "                    <audio controls> <source src=\"../audio/it/$audio_it\" type=\"audio/mp3\"> </audio>";
                echo "                    <p>English Audio:</p>";
                echo "                    <audio controls width=\"50px\"> <source src=\"../audio/eng/$audio_eng\" type=\"audio/mp4\"> </audio>";
                echo "                <br>";
                echo "        </figcaption>";
                echo "        </figure>";
                echo "    </div>";

            }

        }

        function queryLogin( $query ){
            
            if ( $this->connection->query($query) == null ) return false;
            else return true;

        }

        function freeResult(){

            $this->result->free();
    
        }
    
        function closeDB(){
            
            $this->connection->close();
            //echo "<div style=\"margin-top:20px;\"><p>Disconnessione avvenuta con successo.<p></div>"."<br>";
            
        }

        function checkErrors(){

            return $this->error_flag;

        }

    }

    

    

   



?>