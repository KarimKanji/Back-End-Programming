<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
            <h2> Uppg 10: Reflektion och feedback </h2>
            
            <!--intro-->
            <p>
            Projket 2 som helhet har varit relativt krävande och väldigt lärorik. Introduktionen av databaser och SQL var mcyekt att bli van vid, men efter några lektioner
            började det nog och snurra. Överlag av kursen tycker jag att vi har haft bra med tid att göra projekten dock tycker jag att man skulle ha kunna ha mera tid 
            för projekt 2 än för projekt 1 eftersom jag iallafall personligen tycker att projekt 2 var väldigt mycke svårare.
            </p>

            <h2>Uppgift 1: Databasen</h2>
            <p>
            Eftersom uppgift 1 i princip var helt och hållet hanterat under föreläsningar var det lätt att snabbt förstå hur databasen fungerar och eventuellt blev det klarare
            i hur man kan kommunicera med databasen via PHP och SQL. Min databas består av 2 tabeller (obs +1 som försök på uppgift 9's bonus) varav ena är comments och andra
            users. <br> <br>
            <img src="./users_tabell.jpeg" alt="databas_users" width="970px" height="365px"> <br> <br>
            Tabellen users består av 10 kolumner: id, username, realname, password, email, zipcode, bio, salary, preference och likes <br>
            Alla dessa kolumner används i respektive uppgifter vart de behövs. Kolumnernas egenskaper är samma som vi gjorde på föreläsningen + att likes är en integer <br>
            Alltså egenskaperna är "issssssiii". Id är såklart på Auto Increment. <br>
            <br>
            Min andra tabell är comments. Comments hanterar alla kommentarer som man har skrivit på en användares profil. <br>
            <img src="./comments.jpeg" alt="databas_comments" width="605px" height="539"> <br> <br>
            Tabellen består av 3 kolumner: id, comment och profile_id <br>
            Id representerar ett unikt id för varje kommentar(INT). Comment är kommentarens innehåll (VARCHAR). Profile_id representerar id på den människan du kommenterar på (INT). 
            Igen så är id på Auto Increment.

            </p>
            <h2>Uppgift 2: Användarhantering</h2>
            <p>
            Uppgiften befinner sig i inloggning.php och i register.php. För att starta projektet tycker jag att uppgift 2 var ganska krävande, mest för den orsaken att man var så ny till dethär mer 
            avancerade PHP kodandet samt var man helt ny till SQL. Men efter att man klarade av denhär uppgiften blev work-flown bättre eftersom man blev van vid SQL samt lärde sig mer om språket.
            För att testa inloggningen kan du t.ex. använda dig av Användarnamn: Anna, Password: asd <br>
            Som helhet tycker jag att uppgiften var väl strukturerad och var också intressant i och med att man gör ett login / register script som man är van vid från andra sidor. 
            </p>
            <h2>Uppgift 3: Hämta data från databasen </h2>
            <p>
            Uppgiften befinner sig i users.php samt i fetch.php(rad 313->). Som en uppgift består uppgift 3 av många delmoment. Jag gjorde uppgift 3 relativt sent i projektet eftersom den kändes svår. 
            Dock var alla steg ganska logiska och eftersom vi gick egenom uppgiften på några sätt under föreläsningar så blev det klarare hur man skulle göra uppgiften. Då jag gjorde uppgiften förbättrade 
            jag min uppfattning om hur man skall gömma objekt och jag lärde mig hur man begränsar en while loop. Överlag en bra, medelsvår uppgift.
            </p>
            <h2>Uppgift 4: Mata in data i databasen </h2>
            <p>
            Uppgift 2 registrering och uppgift 4 var i princip samma uppgift. Uppgiften befinner sig i 
            </p>
            <h2>Uppgift 5: Ta bort data från databasen</h2>
            <p>
            </p>
            <h2>Uppgift 6: Ändra information i databasen</h2>
            <p>
            </p>
            <h2>Uppgift 7: Sortera och filtrera resultat</h2>
            <p>
            </p>
            <h2>Uppgift 8: Gilla / ogilla </h2>
            <p>
            </p>
            <h2>Uppgift 9: Chatt</h2>
            <p>
            </p>
            <h2> Summering </h2>
            <p>
            </p>
            
            <br>
            <br>
            <br>
            <br>
        </article>

<?php include "footer.php" ?>