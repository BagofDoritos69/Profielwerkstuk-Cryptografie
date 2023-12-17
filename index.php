<?php
session_start();
?>
<html>
  <head>
    <title>Cryptografie Profielwerkstuk</title>
  </head>
  <body>
    <?php
    // Haalt locatie /home/runner/PWStest/XORCipher.php op
    require "XORCipher.php";

    // Haalt de text uit /home/runner/PWStest/plaintext.php op en stopt het in de variable $plaintext
    $plaintext = file_get_contents("plaintext.txt");

    // Maakt de functies beschikbaar in dit document
    $xor = new XORCipher();
    
    // Haalt invoer op
      echo "
        <form method='post' action='index.php'>
          Insert a key:<br><br>
            <input type='text' name='key'><br><br><br>
          <input type='submit' name='submit' value='Submit'>
        </form>
      ";
    
    // Wanneer invoer is gegeven, laat de code lopen
      if(isset($_POST['submit'])) {
        $key = $_POST['key'];
        if(strlen($key) == 8) {
          $cipher = $xor->cipher($plaintext, $key);
          $_SESSION['cipher'] = $cipher;
          echo "The cipher using the key '$key' is:<br> $cipher";
          // Link naar decryptie
          echo"<br><hr><br><a href='https://PWScryptografie--jopkort.repl.co/decrypt.php'><input type='submit' value='Go to decryption'></a>";
        } else {
          echo "'$key' is an invalid key (it needs to be 8 bits long)";
        }
      }

    
    ?> 
  </body>
</html>
