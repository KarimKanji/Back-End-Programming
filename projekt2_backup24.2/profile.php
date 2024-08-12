<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
<h1>Profilsidan</h1>
<br>
<?php 

// print("Din användare: " . $_SESSION['user'] . "<br> <br>");
// print("GET USER: " . $_GET['user'] . "<br><br>");

if (isset($_SESSION['user']) && $_GET['user'] == $_SESSION['user']) {
        $conn = create_conn(); //mysqli objektet skapas
        $user = $_SESSION['user']; //kolla ven som är inloggad
        $sql = "SELECT * FROM users WHERE username = ?"; //? placeholder för data
        $stmt = $conn->prepare($sql); //prepare returnerar mysqli_stmt objekt
        $stmt->bind_param("s" , $user);
        $stmt->execute(); //Returnerar true eller false
        $result = $stmt->get_result(); //Returnerar datan i form av mysqli_result objekt
        $row = $result->fetch_assoc(); //Ta ut datan från mysqli_result till enn assArr

        //Start form
        print("<form method='post' action='profile.php'>");
        //-----------------------
        print("Användarnamnet: <br> <input type='text' name='usernameUpdate' value='" . $row['username'] . "'>  <br><br>");
        print("Riktiga namnet: <br> <input type='text' name='realnameUpdate'value='" .  $row['realname'] . "'>  <br><br>");
        print("Password: <br>       <input type='text' name='passwordUpdate'value='" .  $row['password'] . "'>  <br><br>");
        print("Email: <br>          <input type='text' name='emailUpdate'value='" .     $row['email'] . "'>     <br><br>");
        print("Zipcode: <br>        <input type='text' name='zipcodeUpdate'value='" .   $row['zipcode'] . "'>   <br><br>");
        print("Annonstext: <br>     <textarea name='bioUpdate'>" . $row['bio'] . "</textarea><br>");
        print(" <br> Inkomst: <br>  <input type='text' name='salaryUpdate'value='" .    $row['salary'] . "'>    <br><br>");
        print("Preference: <br>     <input type='text' name='preferenceUpdate'value='". $row['preference'] . "'><br><br>");

        print("<br> <input type='submit' name='update' value='Uppdatera profil'>");
        //Form slut
        print("</form>");
        //----------------------
        //Här kommer tidigare kommentarer
        //TIDITTII: Skriv ut tidigare kommentarer på ens profil
        $sqlc = "SELECT * FROM comments WHERE profile_id = '$row[id]'";
        $resultC = mysqli_query($conn, $sqlc);
        $rowC = mysqli_fetch_assoc($resultC);
        print("<br><br>Tidigare kommentarer på användarens profil: <br><br> ");
                while ($rowC = mysqli_fetch_assoc($resultC)){
                    print("<div class='comment'>" .$rowC['comment'] . "<br></div><br>");
                }

        if (isset($_REQUEST['update'])) {
        
                //Uppdaterar begärt fält + TEST input
                $user = $_SESSION['user'];
                $usernameUpdate = $_REQUEST['usernameUpdate'];
                $realnameUpdate = $_REQUEST['realnameUpdate'];
                $passwordUpdate = hash("sha256", $_REQUEST['passwordUpdate']);
                $emailUpdate = $_REQUEST['emailUpdate'];
                $zipcodeUpdate = $_REQUEST['zipcodeUpdate'];
                $bioUpdate = $_REQUEST['bioUpdate'];
                $salarUpdate = $_REQUEST['salaryUpdate'];
                $preferenceUpdate = $_REQUEST['preferenceUpdate'];

                //Början på sql kommandot
                $sql =  "UPDATE users SET 
                username    = '$usernameUpdate', 
                realname    = '$realnameUpdate',
                password    = '$passwordUpdate', 
                email       = '$emailUpdate',
                zipcode     = '$zipcodeUpdate',
                bio         = '$bioUpdate',
                preference  = '$preferenceUpdate' WHERE username= '$user'";
                
                //Slutet på sql kommandot
                print("<br><br>" . $sql);

                //Fungerade uppdateringen?
                if ($conn->query($sql) === TRUE) {
                print("<br> Record updated successfully");
                } else {
                print(" <br> Error updating record: " . $conn->error);
                }
        }

        //Uppgift 5 - Ta bort data från databasen
        print("<br> <br> På 'Delete' knappen kan du ta ner ditt konto <br>");
        print("<form method='get' action='profile.php'> <input type='submit' name='delete' value='Delete'> </form>"); //har inte login


        if (isset($_REQUEST['delete']) || $_REQUEST['confirmDelete']) {
            $conn = create_conn();
            //Skapa connection och gör delete rutan
            print("<br><form method='get' action='profile.php'> <input type='password' name='confirm' placeholder='Insert password'> ");
            print("<br><input type='submit' name='confirmDelete' value='Confirm Delete'> </form> ");

            if(isset($_REQUEST['confirmDelete'])){
                
                //testar input föratt kolla inmatning
                $confirm = test_input($_REQUEST['confirm']);
                //Tar inmatade passworden och hashar den så at den kan matcha databasens password
                $passwordCheckInput = hash("sha256", $confirm);
                //försäkrar Cross-sitescripting
                $sql = "SELECT * FROM users WHERE username = '$_SESSION[user]'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $pswCheck = $row['password'];
                //Kollar att det säkrade inmatade confirmpassword är samma som databasens password
                

                if($passwordCheckInput == $pswCheck) {
                        // sql to delete a record
                    $login = $_SESSION['user'];
                    $sql = "DELETE FROM users WHERE username= '$row[username]'";
                        if ($conn->query($sql) === TRUE) {
                        print(" <br> User: " . $login ."'s Record deleted successfully");
                        } else {
                        echo "Error deleting record: " . $conn->error;
                        }
                }
            }   
        }

} else {
    print("Du ser på " . $_GET['user']. "s profil");
        if (isset($_SESSION['user'])){
            $conn = create_conn(); //mysqli objektet skapas
            $user = $_GET['user']; //kolla ven som är inloggad
            $sql = "SELECT id, username FROM users WHERE username = ?"; //? placeholder för data
            $stmt = $conn->prepare($sql); //prepare returnerar mysqli_stmt objekt
            $stmt->bind_param("s" , $user);
            $stmt->execute(); //Returnerar true eller false
            $result = $stmt->get_result(); //Returnerar datan i form av mysqli_result objekt
            $row = $result->fetch_assoc(); //Ta ut datan från mysqli_result till enn assArr
            // print("<br> Idn och användarnamnet för profilen du försöker se på:  " . $row['id'] . " " . $row['username']);

            $sqlc = "SELECT * FROM comments WHERE profile_id = '$row[id]'";
            $resultC = mysqli_query($conn, $sqlc);
            $rowC = mysqli_fetch_assoc($resultC);
            print("<br><br>Tidigare kommentarer på användarens profil: <br><br> ");

                    while ($rowC = mysqli_fetch_assoc($resultC)){
                        print("<div class='comment'>" .$rowC['comment'] . "<br></div><br>");

                        //Försök på Uppgift 9
                    //     print("<form method='post' action='profile.php?user=" . $user . "''> ");
                    //     print("<textarea id='commentComment' name='commentComment' rows='1' cols='40'> Kommentera på kommentaren </textarea>");
                    //     print("<br><input type='submit' name='submitCommentComment' value='Kommentera'>");
                    //     print("</form> </div> <br><br>");
                        
                    //     $conn = create_conn();
                    //     $sqlCC = "SELECT * FROM commentComments WHERE comment_id = '1'";
                    //     $resultCC = mysqli_query($conn, $sqlCC);
                    //     $rowCC = mysqli_fetch_assoc($resultCC);
                    //     if($rowC['id'] == $rowCC['comment_id']){
                    //         while ($rowCC = mysqli_fetch_assoc($resultCC)){
                    //             print($rowCC['comment']);
                    //         }

                    // }
                }

                    print(" <br>Lägg till din egen kommentar! <br><br>");
                    print("<form method='post' action='profile.php?user=" . $user . "''> ");
                    print("<textarea id='comment' name='comment' rows='6' cols='60'> Var god och skriv något snällt! </textarea>");
                    print("<br><input type='submit' name='submitComment' value='Kommentera'>");
                    print("</form>");


                        if(isset($_REQUEST['submitComment'])){
                        $conn = create_conn();
                        $comment= test_input($_REQUEST['comment']);
                        $profile_id= $row['id'];
                        // $query = mysqli_query($conn, "SELECT * FROM comments WHERE profile_id = '$rowC[id]'");
                        $statement = $conn->prepare("INSERT INTO comments (comment, profile_id) VALUES (?,?)");
                        $statement->bind_param("si", $comment, $profile_id);
                    
                                if($statement->execute()){
                                print("<br> Din kommentar har skickats");
                                }
                                else {
                                print("<br> Error kommenteringne");
                                }
                        
        //Tidittii: Kommentarsformulär
        //För att hitta kommentarerna för en viss profil måste ni hitta idn för profilen
        //SELECT id, username FROM users WHERE username = $_REQUEST['?(user)']; obs prepared statement
        //SELECT comment FROM comments WHERE profile_id = $row['id'];
        }
    } else {
        print(" <br>För att se kommentarer på användarens profil, logga in!");
    }
}
?>
</article>

<?php include "footer.php" ?>