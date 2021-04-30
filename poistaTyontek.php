<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tyontektunnus = filter_input(INPUT_GET,'tyontektunnus',FILTER_SANITIZE_NUMBER_INT);

    $kysely = $conn->prepare("DELETE FROM tyontekija WHERE tyontektunnus = :tyontektunnus");
    $kysely->bindValue(':tyontektunnus',$tyontektunnus, PDO::PARAM_INT);
    $kysely->execute();

    header('Location: http://localhost/harjoitustyö-php/tyontekijat.php');
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}