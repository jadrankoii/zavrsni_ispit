  <!-- VEZANO UZ PRIJAVU , FORMA LOGIRANJA I POZIV OTVARANJA SLJEDEĆE STRANICE -->


<?php
// logiranje ako je ispravan kontakt
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php"; 
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    
    if ($user) {
        // logiranje ako je ispravna email adresa
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: ../naslovna.html"); //adresiranje iznad na naslovnu stranicu projekta sa ../
            exit;
        }
    }
    
    $is_invalid = true;// zaštita ispis kod krivog logiranja
}

?>

  <!-- zaštita ispis kod krivog logiranja -->
  <?php if ($is_invalid): ?>
          <em><br><br>POGREŠNO LOGIRANJE, NEISPRAVAN EMAIL ILI LOZINKA;<br><br> POKUŠAJTE PONOVO !</em>
          <?php endif; ?>