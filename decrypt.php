<?php
session_start();

// Haalt locatie /home/runner/PWStest/XORCipher.php op
require "XORCipher.php";

// Haalt de text uit /home/runner/PWStest/plaintext.php op en stopt het in de variable $plaintext
$plaintext = file_get_contents("plaintext.txt");

// Maakt de functies beschikbaar in dit document
$xor = new XORCipher();

// Haalt het cijfer op uit vorige code en laat het zien
$cipher = $_SESSION['cipher'];
echo "The made cipher in the previous tab:<br>$cipher<br>";

// Probeert de key te kraken dmv frequentie analise 
$cracked_key = $xor->crack($cipher, 8);

// Probeert het cijfer te kraken dmv frequentie analise en de gekraakte key
$cracked_plaintext = $xor->plaintext($cipher, $cracked_key);

// Als het is gelukt stelt de text op
echo "The cracked key should be:<br>".$cracked_key."<br><br>";
echo "The cracked text should be:<br>".$cracked_plaintext;

// Link terug naar encryptie
echo"<br><hr><br><a href='https://PWScryptografie--jopkort.repl.co/index.php'><input type='submit' value='Back to encryption'></a>";
?>
