<?php
function tilauksetAsiakas($asiakastunnus) {
    $servername = "localhost";
    $username = "harjoitustyoUser";
    $password = "tIPOgJc85ThmqgJb";
    $dbname= "bussiliikenne";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tilausajo WHERE asiakastunnus = :asiakastunnus");
        $stmt->bindValue(":asiakastunnus",$asiakastunnus,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        print("<ol>");
            foreach($result as $row) {
                print("<li>");

                print("<p>");
                print("<b>Tilausnro: </b>");
                print($row['tilausnro']);
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

                print("</li>");
            }
        print("</ol>");
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}