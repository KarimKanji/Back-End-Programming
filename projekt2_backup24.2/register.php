<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Username:<br> <input type="text" name="username" placeholder= "Username">
    <br><br>
    Realname:<br>  <input type="text" name="realname" placeholder= "Firstname Lastname">
    <br><br>
    Password:<br>  <input type="password" name="passwordreg" placeholder= "********">
    <br><br>
    E-mail:<br>  <input type="text" name="email" placeholder= "asd@email.com">
    <br><br>
    Zipcode:<br>  <input type="text" name="zipcode" placeholder= "00110">
    <br><br>
    Bio:<br>  <input type="text" name="bio" placeholder= "Something interesting about yourself!">
    <br><br>
    Salary:<br>  <input type="number" name="salary" placeholder= "What you earn in a month">
    <br><br>
    Preference (1 = Male, 2 = Female, 3 = Both, 4 = Other, 5 = All):<br>  <input type="number" name="preference" min="1" max= "5">
    <br><br>
    <input type="hidden" name="stage" value="signup">
    <input type="submit" name="submit" value="Registrera dig!" >
</form>


<?php
//Uppgift 2 - Registrerings del
//Uppgift 4 - Mata in data i databasen
if(isset($_REQUEST['username']) && isset($_REQUEST['realname']) && isset($_REQUEST['passwordreg']) && isset($_REQUEST['email'])
&& isset($_REQUEST['zipcode']) && isset($_REQUEST['bio']) && isset($_REQUEST['preference'])) {
    $conn = create_conn();
    $username = test_input($_REQUEST['username']);
    $realname = test_input($_REQUEST['realname']);
    $password = test_input($_REQUEST['passwordreg']);
    //Hash the password
    $password = hash("sha256", $password);
    //-------------
    $email = test_input($_REQUEST['email']);
    $zipcode = test_input ($_REQUEST['zipcode']);
    $bio = test_input($_REQUEST['bio']);
    $salary = test_input($_REQUEST['salary']);
    $preference = test_input($_REQUEST['preference']);
    $likes = 0;

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username= '$username' ");
    if (!$query)
    {
        die('Error: ' . mysqli_error($dbl));
    }

    if(mysqli_num_rows($query) > 0){

        echo "This user already exists! Try a different username!";

        }else{
            $statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference, likes) VALUES (?,?,?,?,?,?,?,?,?)");
            $statement->bind_param("ssssssiii", $username, $realname, $password, $email, $zipcode, $bio, $salary, $preference, $likes);
    
                    if($statement->execute()){
                        print("<br> Du har registrerats!");
                    }
                    else {
                        print("<br> Error i registreringen");
                    }
    
            }
}