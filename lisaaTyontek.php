<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nimi = filter_input(INPUT_POST,'nimi',FILTER_SANITIZE_STRING);
    $puh = filter_input(INPUT_POST,'puh',FILTER_SANITIZE_STRING);
    $henktunnus = filter_input(INPUT_POST,'henktunnus',FILTER_SANITIZE_STRING);

    $kysely = $conn->prepare("INSERT INTO tyontekija (nimi, puh, henktunnus) VALUES (:nimi,:puh,:henktunnus)");
    $kysely->bindValue(':nimi',$nimi, PDO::PARAM_STR);
    $kysely->bindValue(':puh',$puh, PDO::PARAM_STR);
    $kysely->bindValue(':henktunnus',$henktunnus, PDO::PARAM_STR);
    $kysely->execute();
    header('Location: http://localhost/harjoitustyö-php/tyontekijat.php');
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}