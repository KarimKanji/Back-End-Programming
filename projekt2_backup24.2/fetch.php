<?php
//Uppgift 3 - Hämta data från databasen
//Uppgift 7 - Sortera och Filtrera
//Om man har sorterat/filtrerat

//Primära alternativ (ändast en checked) EFTER == SÄTT !ISSET
// if(isset($_REQUEST['salary']) && $_REQUEST['salary'] == 'rich' && !isset($_REQUEST['likes']) && !isset($_REQUEST['pref'])){
//     print("Filtrerar: rikaste först");
//      $sql = "SELECT * FROM users ORDER BY salary DESC";
//      fetchAndWrite($sql);
// }
// else if (isset ($_REQUEST['salary']) && $_REQUEST['salary'] == 'poor' && !isset($_REQUEST['likes'])  && !isset($_REQUEST['pref'])) {
//     print("Filtrerar: fattigaste först");
//     $sql = "SELECT * FROM users ORDER BY salary ASC";
//         fetchAndWrite($sql);            
// }
// else if (isset($_REQUEST['likes']) && $_REQUEST['likes'] == 'pop'  && !isset($_REQUEST['salary'])  && !isset($_REQUEST['pref'])){
//     print("Filtrerar: Poppaste först");
//      $sql = "SELECT * FROM users ORDER BY likes DESC";
//      fetchAndWrite($sql);
// }
// else if (isset($_REQUEST['likes']) && $_REQUEST['likes'] == 'notpop' && !isset($_REQUEST['salary'])  && !isset($_REQUEST['pref'])){
//     print("Filtrerar: Opoppaste först");
//      $sql = "SELECT * FROM users ORDER BY likes ASC";
//      fetchAndWrite($sql);
// }

//Sekundära alternativ (2 buttons checked)
// else if(isset($_REQUEST['salary']) && $_REQUEST['salary'] == 'rich' && isset($_REQUEST['likes']) && $_REQUEST['likes'] == 'pop'){
//     print("Filtrerar: rikaste och poppaste först");
//      $sql = "SELECT * FROM users ORDER BY salary DESC, likes";
//      fetchAndWrite($sql);
// }
// else if(isset($_REQUEST['salary']) && $_REQUEST['salary'] == 'poor' && isset($_REQUEST['likes']) && $_REQUEST['likes'] == 'pop'){
//     print("Filtrerar: Fattigaste och poppaste först");
//      $sql = "SELECT * FROM users ORDER BY salary ASC, likes DESC";
//      fetchAndWrite($sql);
// }
// else if(isset($_REQUEST['salary']) && $_REQUEST['salary'] == 'rich' && isset($_REQUEST['likes']) && $_REQUEST['likes'] == 'notpop'){
//     print("Filtrerar: Rikaste och opoppaste först");
//      $sql = "SELECT * FROM users ORDER BY salary DESC, likes ASC";
//      fetchAndWrite($sql);
// }
// else if(isset($_REQUEST['salary']) && $_REQUEST['salary'] == 'poor' && isset($_REQUEST['likes']) && $_REQUEST['likes'] == 'notpop'){
//     print("Filtrerar: Fattigaste och opoppaste först");
//      $sql = "SELECT * FROM users ORDER BY salary ASC, likes";
//      fetchAndWrite($sql);
// }


//Här kommer preferenser

//Primära alternativ (filtrerar ändast enligt preferens)
if ($_REQUEST['pref'] == 'male' && !isset($_REQUEST['likes']) && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens men");
    $sql = "SELECT * FROM users WHERE preference IN ('1')";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'female' && !isset($_REQUEST['likes']) && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens kvinnor");
    $sql = "SELECT * FROM users WHERE preference IN ('2')";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'other' && !isset($_REQUEST['likes']) && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens annan");
    $sql = "SELECT * FROM users WHERE preference IN ('3')";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'both' && !isset($_REQUEST['likes']) && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens båda");
    $sql = "SELECT * FROM users WHERE preference IN ('4')";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'all' && !isset($_REQUEST['likes']) && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens alla");
    $sql = "SELECT * FROM users WHERE preference IN ('5')";
    fetchAndWrite($sql);
}

//Ifall användaren vill filtrera med preferens och andra alternativ

//Här kommer preferens + salary
//Preferens male + salary
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['salary'] =='rich' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens manlig, Rika");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY salary DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['salary'] =='poor' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens manlig, Fattiga");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY salary ASC";
    fetchAndWrite($sql);
}
//Preferens female + salary
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['salary'] =='rich' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens kvinnlig, Rika");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY salary DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['salary'] =='poor' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens kvinnlig, Fattig");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY salary ASC";
    fetchAndWrite($sql);
}
//Preferens annan + salary
else if ($_REQUEST['pref'] == 'other' && $_REQUEST['salary'] =='rich' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens annan, Rika");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY salary DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'other' && $_REQUEST['salary'] =='poor' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens annan, Fattiga");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY salary ASC";
    fetchAndWrite($sql);
}
//Preferens båda + salary
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['salary'] =='rich' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens båda, Rika");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY salary DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['salary'] =='poor' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens båda, Fattiga");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY salary ASC";
    fetchAndWrite($sql);
}
//Preferens alla + salary
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['salary'] =='rich' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens alla, Rika");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY salary DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['salary'] =='poor' && !isset($_REQUEST['likes'])) {
    print("Filtrerar: Preferens alla, Fattiga");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY salary ASC";
    fetchAndWrite($sql);
}


//Här kommer preferens + popularitet
//Preferens male + popularitet
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['likes'] =='pop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens manlig, Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['likes'] =='notpop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens manlig, Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY likes ASC";
    fetchAndWrite($sql);
}
//Preferens female + popularitet
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['likes'] =='pop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens kvinnlig, Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['likes'] =='notpop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens kvinnlig, Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY likes ASC";
    fetchAndWrite($sql);
}
//Preferens annan + popularitet
else if ($_REQUEST['pref'] == 'other' && $_REQUEST['likes'] =='pop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens annan, Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'other' && $_REQUEST['likes'] =='notpop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens annan, Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY likes ASC";
    fetchAndWrite($sql);
}
//Preferens båda + popularitet
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['likes'] =='pop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens båda, Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['likes'] =='notpop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens båda, Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY likes ASC";
    fetchAndWrite($sql);
}
//Preferens alla + popularitet
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['likes'] =='pop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens alla, Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['likes'] =='notpop' && !isset($_REQUEST['salary'])) {
    print("Filtrerar: Preferens alla, Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY likes ASC";
    fetchAndWrite($sql);
}


//Här kommer preferens + salary + popularitet
//Preferens male + salary + popularitet
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens manlig, Rik och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY salary DESC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens manlig, Rik och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY salary DESC, likes ASC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens manlig, Fattig och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY salary ASC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'male' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens manlig, Fattig och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('1') ORDER BY salary ASC, likes ASC";
    fetchAndWrite($sql);
}

//Preferens female + salary + popularitet
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens kvinnlig, Rik och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY salary DESC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens kvinnlig, Rik och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY salary DESC, likes ASC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens kvinnlig, Fattig och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY salary ASC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'female' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens kvinnlig, Fattig och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('2') ORDER BY salary ASC, likes ASC";
    fetchAndWrite($sql);

//Preferens annan + salary + popularitet
}else if ($_REQUEST['pref'] == 'other' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens annan, Rik och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY salary DESC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'other' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens annan, Rik och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY salary DESC, likes ASC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'other' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens annan, Fattig och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY salary ASC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'other' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens annan, Fattig och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('3') ORDER BY salary ASC, likes ASC";
    fetchAndWrite($sql);
}
//Preferens båda + salary + popularitet
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens båda, Rik och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY salary DESC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens båda, Rik och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY salary DESC, likes ASC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens båda, Fattig och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY salary ASC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'both' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens båda, Fattig och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('4') ORDER BY salary ASC, likes ASC";
    fetchAndWrite($sql);
}
//Preferens alla + salary + popularitet
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens alla, Rik och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY salary DESC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'rich') {
    print("Filtrerar: Preferens alla, Rik och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY salary DESC, likes ASC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['likes'] =='pop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens alla, Fattig och Pop");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY salary ASC, likes DESC";
    fetchAndWrite($sql);
}
else if ($_REQUEST['pref'] == 'all' && $_REQUEST['likes'] =='notpop' && $_REQUEST['salary'] == 'poor') {
    print("Filtrerar: Preferens alla, Fattig och Inte pop");
    $sql = "SELECT * FROM users WHERE preference IN ('5') ORDER BY salary ASC, likes ASC";
    fetchAndWrite($sql);
}


else {
    $sql = "SELECT * FROM users ORDER BY salary DESC";
    fetchAndWrite($sql); 
}

//Uppgift 3 - Hämta data från databasen
function fetchAndWrite ($sql) {
    $conn = create_conn();
    $counter = 0;
    $max = 8;
    if($result = $conn->query($sql)){
        //Uppgift 3 - Max 8 annonser per sida
        while(($row = $result->fetch_assoc()) and ($counter < $max)) {
        print("<p class= 'ad'>");
        print("Användarnamn: " . $row['username'] . "<br>");
        print("Riktiga namn: " . $row['realname'] . "<br>");
        $prefArr = ['Fillerföratträkningbörjarfrån0' , 'Manlig' , 'Kvinnlig', 'Båda' , 'Annan', 'Alla' ];
        print("Preferens: " . $prefArr[$row['preference']] . "<br>");
        print("Bio: " . $row['bio'] . "<br>");
        print("Likes: " . $row['likes'] . "<br>");


        //Uppgift 3 - Visa inte eposten eller årslönen ifall man inte är inloggad
            if(isset($_SESSION['user'])) {
                print("Lön: " . $row['salary'] . "<br>");
                print("Email: " . $row['email'] . "<br>");
                print("Zipcode: " . $row['zipcode'] . "<br> <br>");
                //Uppgift 8 - Gilla och Ogilla
                print("<form action='users.php' method='post'> Like: <input type='submit' name='like' value='$row[username]' label='like'> Dislike:
                <input type='submit' name='dislike' value='$row[username]'>");
            } else {
                print("För att se tillägs information logga in!<br>");
                
            }
        print("<br><a href='./profile.php?user=" . $row['username'] . "'> Kommentera!</a>" . "</p>");
        $counter++;
        }
        if(isset($_REQUEST['like'])){
            $sql =  "UPDATE users SET likes = likes + '1' WHERE username = '$_REQUEST[like]'";//SQLINJECT
            //Fungerade uppdateringen?
            if ($conn->query($sql) === TRUE) {
            print("<br> Record updated successfully");
            } else {
            print(" <br> Error updating record: " . $conn->error);
            }
        }

        else if(isset($_REQUEST['dislike'])){
            $sql =  "UPDATE users SET likes = likes - '1' WHERE username = '$_REQUEST[dislike]'";//SQLINJECT
            //Fungerade uppdateringen?
            if ($conn->query($sql) === TRUE) {
            print("<br> Record updated successfully");
            } else {
            print(" <br> Error updating record: " . $conn->error);
            }
        }
    } 
    else {
        print("Något gick fel, senaste felet: " . $conn->error);
    }
}





