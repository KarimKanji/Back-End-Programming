<form method="post" action="index.php">  
    Login:<br> <input type="text" name="login">
    <br> <br>
    Password:<br>  <input type="password" name="password" >
    <br><br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" name="submit" value="Logga in" >
</form>

<?php

//Uppgift 2 - Inloggnings del
    if (isset($_REQUEST['login']) && isset($_REQUEST['password']))  {
    
    // $_SESSION['user'] = $_REQUEST['login']; //Sätt denhär efter att man har checka att användaren och lösenordet är samma
    
    //Koppla oss till databasen
    $conn = create_conn();
    $sql = "SELECT * FROM users WHERE username = '$_REQUEST[login]'"; //CSS
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    //Att crosschecka
    //Vi tar Formens password och sparar de i variabel i hash format
    $pswHashed = hash("sha256", $_REQUEST['password']);
    $usrCheck = $row['username'];
    $pswCheck = $row['password'];

        if($_REQUEST['login'] == $usrCheck) {
            if ($pswHashed == $pswCheck) {
                $_SESSION['user'] = $usrCheck; //Sätt denhär efter att man har checka att användaren och lösenordet är samma
            // om password och login från databsane matchar formen så ändra sessionuser till login
            print(" <br> <br> Inloggningen lyckades! Du är nu inloggad som: " . $usrCheck);
        }
        } else {
            print("Dina credentials finns inte i databasen, var god och registrera dig!");
        }    
}
// else if (isset($_REQUEST['delete'])) {
//             print("hejssan");
//             $conn = create_conn();
            
//              // sql to delete a record
//             $login = $_SESSION['user'];
//             $sql = "DELETE FROM users WHERE username= '$login'" ; //unsafe
//             print($sql);
//             if ($conn->query($sql) === TRUE) {
//             echo "Record deleted successfully";
//             } else {
//             echo "Error deleting record: " . $conn->error;
//             }
// }



