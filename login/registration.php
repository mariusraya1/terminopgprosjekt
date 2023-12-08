
<html>
    <head>
        <link rel="stylesheet" href="css\style.css">
        <meta charset="utf-8">
        <title>PHP registrering</title>
    </head>
    <body>

    
        <a href="index.html" class="loginn" target="_top">Log inn</a>
        <a href="oppskrifter.html" class="hjem" target="_top">Hjem</a>

        <style>
            .hjem, .loginn, .lagbruker {
                font-size: 150%;
                color: aquamarine;
                margin-right: 1%;
            }
        </style>
<br><br>


        <p>Opprett ny bruker:</p>
        <form method="post">
            <label for="brukernavn">Brukernavn:</label>
            <input type="text" name="brukernavn" /><br />
            <label for="passord">Passord:</label>
            <input type="password" name="passord" /><br />

            <input type="submit" value="Logg inn" name="submit" />
        </form>    
    </body>
    <?php
        if(isset($_POST['submit'])){
            //Gjøre om POST-data til variabler
            $brukernavn = $_POST['brukernavn'];
            $passord = $_POST['passord'];
            
            //Koble til databasen
            $dbc = mysqli_connect('localhost', 'root', 'Admin', 'terminoppgave')
              or die('Error connecting to MySQL server.');
            
            //Gjøre klar SQL-strengen
            $query = "INSERT INTO users VALUES ('$brukernavn','$passord')";
            
            //Utføre spørringen
            $result = mysqli_query($dbc, $query)
              or die('Error querying database.');
            
            //Koble fra databasen
            mysqli_close($dbc);

            //Sjekke om spørringen gir resultater
            if($result){
                //Gyldig login
                echo "Takk for at du lagde bruker! Trykk <a href='index.html'>her</a> for å logge inn";
            }else{
                //Ugyldig login
                echo "Noe gikk galt, prøv igjen!";
            }
        }
    ?>
</html>