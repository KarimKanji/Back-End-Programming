<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Bläddra bland kontaktannonser</h1>
    <br>
    <p> Använd gärna filterings och sorteringsformulär </p>

    <p> 
        <!-- filtrerings formulär-->
        <form action="users.php" method="get">
        <!-- Radio buttons för sortering -->
        <label for="rich">Rika först</label>
        <input type="radio" name="salary" value="rich"> 

        <label for="poor">Rika sist</label>
        <input type="radio" name="salary" value="poor"> <br> <br>

        <label for="pop">Populära först</label>
        <input type="radio" name="likes" value="pop">

        <label for="notpop">Populära sist</label> 
        <input type="radio" name="likes" value="notpop"> <br> <br>


        <!-- Dropdown för preferens -->
        <label for="pref">Preference:    </label> 

            <select name="pref">
            <option value="male">Manlig</option>
            <option value="female">Kvinnlig</option>
            <option value="other">Annan</option>
            <option value="both">Båda</option>
            <option value="all">Alla</option>

            </select>

            <input type="submit" value="Filtrera"> 


    </p>
    <?php include "fetch.php" ?>
</article>

<?php include "footer.php" ?>