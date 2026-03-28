<?php
try {
$pdo = new PDO("mysql:host=127.0.0.1;dbname=s2089123_website;charset=utf8mb4", "s2089123", "Mozartumbrella21yo!");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#echo "Connected successfully";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

# adapted from week 3 class code & https://www.w3schools.com/php/php_mysql_connect.asp 
# ai bug fixing to replace localhost with 127.0.0.1 
?>