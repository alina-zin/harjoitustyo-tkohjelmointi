<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

$tyontektunnus = filter_input(INPUT_GET,'tyontektunnus',FILTER_SANITIZE_NUMBER_INT);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM tilausajo WHERE tyontektunnus =:tyontektunnus");
    $stmt->bindValue('tyontektunnus', $tyontektunnus, PDO::PARAM_INT);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
  
    print("<a href='tyontekijat.php?'>Takaisin</a>");
    foreach($result as $row) {
        print("<hr/>");

        print("<p>");
        print("<b>Työntekijän tunnus: </b>");
        print($row['tyontektunnus']);
        print("</p>");

        print("<p>");
        print("<b>Tilausnro: </b>");
        print($row['tilausnro']);
        print("</p>");

        print("<p>");
        print("<b>Asiakastunnus: </b>");
        print($row['asiakastunnus']);
        print("</p>");

        print("<p>");
        print("<b>Ajoneuvo ID: </b>");
        print($row['ajoneuvo_nro']);
        print("</p>");

        print("<p>");
        print("<b>Asiakasmäärä: </b>");
        print($row['asiakasmaara']);
        print("</p>");

        print("<p>");
        print("<b>Mistä: </b>");
        print($row['lähtöpaikka']);
        print("</p>");
        
        print("<p>");
        print("<b>Lähtöaika: </b>");
        print($row['aloitusaika']);
        print("</p>");

        print("<p>");
        print("<b>Minne: </b>");
        print($row['maali']);
        print("</p>");

        print("<p>");
        print("<b>Lopetusaika: </b>");
        print($row['lopetusaika']);
        print("</p>");   

    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>