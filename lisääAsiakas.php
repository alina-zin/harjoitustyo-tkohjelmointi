<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nimi = filter_input(INPUT_POST,'nimi',FILTER_SANITIZE_STRING);
    $puh = filter_input(INPUT_POST,'puh',FILTER_SANITIZE_NUMBER_INT);
    $sahkoposti = filter_input(INPUT_POST,'sahkoposti',FILTER_SANITIZE_STRING);

    $kysely = $conn->prepare("INSERT INTO asiakas (nimi, puh, sahkoposti) VALUES (:nimi,:puh,:sahkoposti)");
    $kysely->bindValue(':nimi',$nimi, PDO::PARAM_STR);
    $kysely->bindValue(':puh',$puh, PDO::PARAM_INT);
    $kysely->bindValue(':sahkoposti',$sahkoposti, PDO::PARAM_STR);
    $kysely->execute();
    header('Location: http://localhost/harjoitustyö-php/index.php');
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}