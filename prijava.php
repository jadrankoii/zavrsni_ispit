<!-- ZAVRŠNI ISPIT PRIJAVA ELPROS 23.OŽUJAK 2023, MIKROKVALIFIKACIJE 
WEB PROGRAMER , VEZANO ZA CSS PRIJAVA I SLIKA LOGA U SLIKAMA -->




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="grupa.css/prijava.css">
  <title>prijava</title>
</head>
<body>




 
  <!-- GLAVNI KONTEJNER ,SPREMNIK -->
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">


      <!-- SLIKA -->
      <div class="front">
        <img src="slike/logo.png.png" style="width:350px; padding: 30px 30px;   margin-left: -43px;"  alt=""> 
      </div>
     
    </div>



    <!-- POČETAK LOGIN FORME  -->
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <h1>ELPROS</h1><br>
          <div class="title">PRIJAVA</div>

          <!-- DOHVAT STRANICE PROCESS-LOGIN.PHP  DEFINICIJA FORME -->
          <form action="grupa.php/process-login.php" method="post" id="login" novalidate>
          <div class="input-boxes">

            <div class="input-box">
            <!-- email -->
            <input type="email" name="email" id="email" placeholder="Upišite email" required
                   value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    
            </div>

            <div class="input-box">
              <!-- lozinka -->
              <input type="password" name="password" id="password" placeholder="Upišite lozinku" required>
            </div>  

            <div class="button input-box">
              <input type="submit" value="POTVRDI">
            </div>

            <div class="text sign-up-text">Nemate račun? <label for="flip">REGISTRIRAJ SE!</label></div>
          </div>
      </form>
    </div>





      <!-- POČETAK REGISTRACIJSKE FORME -->
    <div class="signup-form">
     <div class="title">REGISTRACIJA</div>

          <!-- DOHVAT STRANICE PROCESS-SIGNUP.PHP  DEFINICIJA FORME -->
       <form action="grupa.php/process-signup.php" method="post" id="signup" novalidate>
            <div class="input-boxes">

              <div class="input-box">
                <!--ime -->
                <input type="text" id="name" name="name" placeholder="Upišite ime" required>
              </div>

              <div class="input-box">
                <!-- email -->
                <input type="email" id="email" name="email" placeholder="Upišite email" required>
              </div>

              <div class="input-box">
                <!-- lozinka -->
                <input type="password" id="password" name="password" placeholder="Upišite lozinku" required>
              </div>

              <div class="input-box">
                <!-- ponavljanje lozinke -->
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ponovite lozinku" required>
              </div><br>

              <p>Popunjavanjem podataka prihvaćate naše <a href="vanjskedatoteke/Politika-privatnosti-Elektrotehnicka-i-prometna-skola-osijek.pdf" 
                   style="color:dodgerblue">Uvjete & Privatnost</a>.</p>

              <div class="button input-box">
                <input type="submit" value="POTVRDI">
              </div>


              <div class="text sign-up-text">Imam pristup računu? <label for="flip">PRIJAVI SE!</label></div>
            </div>
       </form>
     </div>
    </div>


    
 
  
</body>
</html>
