<a href="./"><img id="logo" src="logo.svg" alt="HTML - Hot Tasteful Mesmerizing Love " /></a>
<nav>
    <ul>
        <li><a href="./index.php">Hem</a></li>
        <li><a href="./users.php">Annonser</a></li>
        <?php $user = $_SESSION['user']; ?>
      <?php print("  <li><a href='./profile.php?user=" . $user . "'>Din Profil</a></li>"); ?>
        <li><a href="./rapport.php">Rapport</a></li>
    </ul>
    <?php 
        print(" <br><h3> Du är inloggad som: " . $_SESSION['user'] . " </h3>");
    ?>
</nav>

