<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $asiakastunnus = filter_input(INPUT_GET,'asiakastunnus',FILTER_SANITIZE_STRING);

    $kysely = $conn->prepare("DELETE FROM asiakas WHERE asiakastunnus = :asiakastunnus");
    $kysely->bindValue(':asiakastunnus',$asiakastunnus, PDO::PARAM_STR);
    $kysely->execute();

    header('Location: http://localhost/harjoitustyö-php/index.php');
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}