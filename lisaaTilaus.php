<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $asiakastunnus = filter_input(INPUT_POST,'asiakastunnus',FILTER_SANITIZE_NUMBER_INT);
    $tyontektunnus = filter_input(INPUT_POST,'tyontektunnus',FILTER_SANITIZE_NUMBER_INT);
    $ajoneuvo_nro = filter_input(INPUT_POST,'ajoneuvo_nro',FILTER_SANITIZE_NUMBER_INT);
    $asiakasmaara = filter_input(INPUT_POST,'asiakasmaara',FILTER_SANITIZE_NUMBER_INT);
    $lahtopaikka = filter_input(INPUT_POST,'lähtöpaikka',FILTER_SANITIZE_STRING);
    $aloitusaika = filter_input(INPUT_POST,'aloitusaika',FILTER_SANITIZE_STRING);
    //$uusi_aloitus = date('Y-m-d',strtotime($aloitusaika));
    $lopetusaika = filter_input(INPUT_POST,'lopetusaika',FILTER_SANITIZE_STRING);
    //$uusi_lopetus = date('Y-m-d',strtotime($lopetusaika));
    $maali = filter_input(INPUT_POST,'maali',FILTER_SANITIZE_STRING);

    $kysely = $conn->prepare("INSERT INTO tilausajo (asiakastunnus, tyontektunnus, ajoneuvo_nro, asiakasmaara, lähtöpaikka, maali, aloitusaika, lopetusaika) VALUES (:asiakastunnus, :tyontektunnus, :ajoneuvo_nro, :asiakasmaara, :lahtopaikka, :maali, :aloitusaika, :lopetusaika)");
    $kysely->bindValue(':asiakastunnus',$asiakastunnus, PDO::PARAM_INT);
    $kysely->bindValue(':tyontektunnus',$tyontektunnus, PDO::PARAM_INT);
    $kysely->bindValue(':ajoneuvo_nro',$ajoneuvo_nro, PDO::PARAM_INT);
    $kysely->bindValue(':asiakasmaara',$asiakasmaara, PDO::PARAM_INT);
    $kysely->bindValue(':lahtopaikka',$lahtopaikka, PDO::PARAM_STR);
    $kysely->bindValue(':aloitusaika',$aloitusaika, PDO::PARAM_STR);
    $kysely->bindValue(':lopetusaika',$lopetusaika, PDO::PARAM_STR);
    $kysely->bindValue(':maali',$maali, PDO::PARAM_STR);
    $kysely->execute();
    header('Location: http://localhost/harjoitustyö-php/tilausajot.php');
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}