<?php 
session_start();
include "functions.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karim och Sebastians Projekt</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">
        <?php include "navbar.php" ?>

        <!-- Artiklar placerar sig snyggt efter varann -->
        <article>
            <h2>Uppg 1: Användar data</h2>

            <?php 
        
        print(' ');
        //Här kommer Användarens namn
        print('Användarens namn: ' . $_SERVER['REMOTE_USER']);
        print('<br>');
        //Här kommer Användarens IP-Adress
        print('Användarens IP-Adress: ' . $_SERVER['REMOTE_ADDR']);
        //Här kommer SERVERNS PORT
        $serverPort = $_SERVER['SERVER_PORT'];
        print('<br>');
        print('Servern snurrar på port :' . $serverPort);
        print('<br> <br>');
        //Här kommer APACHE och PHP Versionerna
        $apacheVersion = apache_get_version();
        print('Apache versionen: ' . $apacheVersion);
        print('<br>');
        $phpVersion = phpversion();
        print('PHP Versionen: ' . $phpVersion);
        print('<br>');
        //Här kommer serverns namn och IP addresser 
        $serverName = $_SERVER['SERVER_NAME'];
        print('Serverns namn: ' . $serverName);
        print('<br>');
        $serverIP = $_SERVER['SERVER_ADDR'];
        print('Serverns IP-Adress: ' . $serverIP);

        ?>

        </article>

        <article>
            <h2>Uppg 2: Tid och Datum</h2>

        <?php
        //date_default_timezone_set('Europe/Helsinki');
        //Här kommer tid och datum
        print('Klockan är: ' . date('H:i'));
        print('<br>');
        print('Datumet är: ' . date('d.m.Y'));
        print('<br>');
        print('Vad är det för dag?: ');
        //Svenska??:
        date_default_timezone_set('Europe/Helsinki');
        setlocale(LC_ALL, array('sv_FI.UTF-8','sv_FI@euro','sv_FI','finnish'));
        print(strftime('%A'));
        print('<br>');
        print('Vad är det för månad?: ');
        print(strftime('%B'));
        print('<br>');
        print('Vad är det för vecka?: ');
        print(strftime('%W'));
        ?>
        <br>
        <br>
            
        </article>
        
        <article>
        <h2>Uppg 3: Formulär</h2>
        <form action="index.php" method="get"> <br>
        Dag: <br><input type="text" name="day"><br> <br>
        Månad: <br> <input type="text" name="month"><br> <br>
        År: <br> <input type="text" name="year"><br> <br>
        <input type="submit">
        
        </form>

        <?php

        if (isset($_REQUEST["day"]) && isset($_REQUEST["month"])) {

        print('<br>');
        $day = $_GET['day'];
        $month = $_GET['month'];
        $year = $_GET['year'];
        $t=time();
        $date_1 = date("Y-m-d",$t);
        $date_2 = date("Y-m-d",mktime(0,0,0,$month,$day,$year));
        print('Dagens datum är: ' . date("d.m.Y",$t) . "<br>");
        print('Datumet du vill veta info till: ' . date("d.m.Y",mktime(0,0,0,$month,$day,$year)) . "<br>");
        print('Den dagen är en: ' .date("l", mktime(0,0,0,$month,$day,$year)) . "<br>" ); //Till svenska?
        //print('Hur många dagar är det tills ditt datum?: ' . $_GET['day']);
        //print("Tid till ditt datum: " . (time() + ($year * $month * $day * 24 * 60 * 60) - $t));
        $origin = date_create($date_1);
        $target = date_create($date_2);
        $interval = date_diff($origin, $target);
        //print('Dagar till detta datum: ' . $interval->format('%y År %m Månader %d Dagar %h Timmar %i Minuter %s Sekunder'));
        print('Obs! beräkningen räknar absolutbeloppet till begärt datum! <br>');
        print('Dagar till detta datum: ' . $interval->format('%a dagar'));
        print('<br>');
        print('Timmar till detta datum: ' . $interval->days*24 . ' h');
        print('<br>');
        print('Minuter till detta datum: ' . $interval->days*24*60 .' min');
        print('<br>');
        print('Sekunder till detta datum: ' . $interval->days*24*60*60 . ' sekunder');
        print('<br>');
        //Anmäl till användaren om datumet är i framtiden eller det förflutna
            if($date_1>$date_2){
                print('<br> Datumet du vill veta info från är i det förflutna');

            }
            elseif ($date_1 == $date_2){
              print('<br> Idag!');
            }
            else {
                print('<br> Datumet du vill veta info från är i framtiden');

            }
        
        }
        
        ?>
        </article>


        <article>
            <h2> Uppg 4: Signup form </h2>
                
                <?php
                // Definierar variabler
                $nameErr = $emailErr =  "";
                $name = $email = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Det krävs ett namn!";
                } else {
                    $name = test_input($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameErr = "Ändast bokstäver och mellanrum tillåtna";
                    }
                }
                
                if (empty($_POST["email"])) {
                    $emailErr = "Det krävs en Epost";
                } else {
                    $email = test_input($_POST["email"]);
                    // kollar om email är ok format
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Ogiltigt E-post format";
                    }
                }
                }


                    function rand_string( $length ) {
                        $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                        return substr(str_shuffle($chars),0,$length);
                        
                    }

                    $pass = rand_string(8);

                    $msg = $_POST["name"] . ",\n\nHär är din kod: $pass ";

                    mail($_POST["email"], "Ditt losenord", $msg);
                    
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                Användarnamn:<br> <input type="text" name="name" placeholder= "Egetnamn">
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
                E-post:<br>  <input type="text" name="email" placeholder= asd@email.com>
                <span class="error">* <?php echo $emailErr;?></span>
                <br><br>
                <input type="submit" name="submit" value="Registrera dig!" >  
                </form>
        </article>


        <article>
            <h2> Uppg 5: Cookie </h2>
                <?php

                if (!isset($_COOKIE['username'])) {
                //Cookien som håller koll på när cookiena är gjorda -> creation date
                $creationCookieName = 'creation';
                $creationValue = date("d.m.Y-H:i:s" ,time());
                setcookie($creationCookieName, $creationValue, time() + (86400 * 2), "/");
                }
                //Hur får jag cookien att göra en snapshot av tiden? IFSATS

                $cookieName = 'username';
                $cookieValue = $_SERVER['PHP_AUTH_USER'];
                setcookie($cookieName, $cookieValue, time() + (86400 * 2), "/");

                if (isset($_COOKIE['username'])) {
                print('<p> Välkommen tillbaka ' . $cookieValue . "!</p>");
                print('<p> Första gången du besökte denhär sidan var: ' . $_COOKIE['creation'] );
                }
                ?>

        </article>

        <article>
            <h2>Uppg 6: PHP-Session</h2>

            <form method="post" action="index.php">  
                Login:<br> <input type="text" name="login">
                <br> <br>
                Password:<br>  <input type="password" name="password" >
                <br><br>
                <input type="submit" name="submit" value="Logga in" >  
                </form>
        <?php
        //NAVBAR hälsning
        $login = test_input($_REQUEST['login']);
        $losenord = test_input($_REQUEST['password']);

        if ($login == "dennis") {
            $_SESSION['user'] = "dennis";
            print("<p> Endast Dennis har tillgång till DARKWEB </p>");
            print("<a href='darkweb.php' target='_blank'> DARK WEB </a>");
        }

        else if ($login == "skurk"){
            $_SESSION['user'] = "skurk";
            print("<p>Hej skurk du har inte tillgång till </p>");
            print("<a href='darkweb.php' target='_blank'> DARK WEB </a>");

        }
        else {
            print("<p> Inga hemlisar för skurkar </p>");
        }
        ?>
        
        </article>


        <article>
            <h2> Uppg 7: Ladda upp fil </h2>

            <form action="upload.php" target='_blank' method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </form>
             

        </article>

        <article>
            <h2> Uppg 8: Besöksräknare </h2>
                <?php
                $file = basename("besok.log"); 
                $no_of_lines = count(file($file)); 
                print("Obs räkningen börjar från 0! <br>");
                print("Det finns: " . $no_of_lines . " besök registrerade i filen: " . $file);
                print("<br> <a href='besok.log' target='_blank'> <p> Besöks loggen </p> </a> ");
                $myfile = fopen("besok.log", "a+") or die("Kan inte öppna fil!");
                fwrite($myfile, "Besok nummer: " . $no_of_lines . " User: " . $_SERVER['PHP_AUTH_USER'] .  " besokte : " . date("d.m.Y-H:i:s" ,time()) . " Anvandarens IP-adress: " . $_SERVER['REMOTE_ADDR'] . "\n");
                fclose($myfile);
                ?>
        </article>


        <article>
            <h2> Uppg 9: Gästbok </h2>

                <form action="index.php" id="usrform" method = "post">
                Namn: <br> <input type="text" name="usrname">
                <input type="submit" name="submitComment">
                </form>
                <br>
                <textarea rows="4" cols="50" name="comment" form="usrform">Lägg till din kommentar, ge gärna feedback om sidan! </textarea>

                <?php
                if(isset($_POST['submitComment'])){
                print("<br> <a href='gastbok.log' target='_blank'> <p> Här hittar du en fil som visar alla kommentarer </p> </a> ");
                $usrname = $_POST['usrname'];
                $kommentar = $_POST['comment'];
                //$gastbok = fopen("gastbok.log", "a+") or die("Kan inte öppna fil!");
                //fwrite($gastbok, " User: " . $_SERVER['PHP_AUTH_USER'] .  " besokte : " . date("d.m.Y-H:i:s" ,time()) . " Anvandaren " . $usrname .  " kommenterade: " . $kommentar . "\n"  );
                //fclose($gastbok);
                //Hur får man sidan att ändast uppdatera om man klickar på submit och inte på refresh efter att man har submitta en gång? 
                $file_data = " User: " . $_SERVER['PHP_AUTH_USER'] .  " besokte : " . date("d.m.Y-H:i:s" ,time()) . " Anvandaren " . $usrname .  " kommenterade: " . $kommentar . "\n";
                $file_data .= file_get_contents('gastbok.log');
                file_put_contents('gastbok.log', $file_data);
                }

                print("<br><br>");
                ?>
        </article>

        <article>
            <h2> Uppg 10: Reflektion och feedback </h2>
              <?php  
            print("<a href='./reflektionochfeedback.php' target='_blank'> Reflektioner och feedback </a>");

            print("<br><br><br><br>");
            ?>
        </article>
        
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>
