<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h2>Välkommen till den bästa datingsiten! </h2> 
    <h4> Börja med att logga in eller registrera dig </h4>

    
    <form method="post" action="index.php">  
    <a href="index.php?stage=signin"><input type="button" name="submit" value="Logga in" ></a>
    <a href="index.php?stage=signup"><input type="button" name="submit" value="Registrera dig!" ></a>
    </form> 
    
    <br> 

<?php 
//Om man har klickat på register knappen - includea register.php

if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin' || $_REQUEST['stage'] == 'login' )){
include "inloggning.php";
}
else if (isset($_REQUEST['delete'])){
    include "inloggning.php";
}

else if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup') ){
    include "register.php";
}
?>


</article>

<article>

<h2> </h2>

</article>

<?php include "footer.php" ?>

