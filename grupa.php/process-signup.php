<!-- VEZANO UZ PRIJAVU , FORMA REGISTRACIJE OTVARANJE STRANICE
NAKON USPJEŠNOG REGISTRIRANJA NOVOG KORISNIKA -->


<?php


if (empty($_POST["name"])) {
    die(" MOLIMO UPIŠITE IME !  ");
}// validacija imena

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die(" MOLIMO UPIŠITE ISPRAVAN EMAIL !");
} // validacija email adrese

if (strlen($_POST["password"]) < 8) {
    die("LOZINKA MORA SAČINJAVATI MINIMUM 8 ZNAKOVA !");
} // uvjet lozinke mora imati barem 8 znakova-

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("LOZINKA MORA SAČINJAVATI BAREM JEDNO SLOVO !");
} // uvjet lozinka mora sadržavati narem jedno slovo

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("LOZINKA MORA SAČINJAVATI BAREM JEDAN BROJ !");
}// uvjet lozinka mora sadrzžavati barej jedan broj

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("LOZINKE MORAJU BITI IDENTIČNE !");
}// uvjet za lozinku da se mora poklapati sa izvornom lozinkom

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
// kodiranje lozinke sa nasumičnim znakovima upisanih u bazu



$mysqli = require __DIR__ . "/database.php";
//umetanje baze podataka



$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}// upisivanje i greške u bazu podataka


 

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {
  
    header("Location: ../prijava.php"); // adresiranje stranica glavna stranica sa login elem, iznad sa ../
    exit;// međustranica nakon uspješnog registriranja povratak na login

  
    
} else {
    
   
   if ($mysqli->errno === 1062) {
        die("EMAIL SE VEĆ KORISTI, MOLIMO UPIŠITE DRUGI !");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
