<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tilausnro = filter_input(INPUT_GET,'tilausnro',FILTER_SANITIZE_NUMBER_INT);

    $kysely = $conn->prepare("DELETE FROM tilausajo WHERE tilausnro = :tilausnro");
    $kysely->bindValue(':tilausnro',$tilausnro, PDO::PARAM_INT);
    $kysely->execute();

    header('Location: http://localhost/harjoitustyö-php/tilausajot.php');
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}