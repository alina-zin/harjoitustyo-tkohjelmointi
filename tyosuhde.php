<?php
function tyosuhde($tyontektunnus) {
    $servername = "localhost";
    $username = "harjoitustyoUser";
    $password = "tIPOgJc85ThmqgJb";
    $dbname= "bussiliikenne";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tyosuhde WHERE tyontektunnus = :tyontektunnus");
        $stmt->bindValue(":tyontektunnus",$tyontektunnus,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        print("<ol>");
            foreach($result as $row) {
                print("<li>");

                print("<p>");
                print("<b>Työntekijätunnus: </b>");
                print($row['Tyontektunnus']);
                print("</p>");

                print("<p>");
                print("<b>Työnimike: </b>");
                print($row['tyonimike']);
                print("</p>");

                print("<p>");
                print("<b>Aloituspvm: </b>");
                print($row['Aloituspvm']);
                print("</p>");

                print("<p>");
                print("<b>Lopetuspvm: </b>");
                print($row['Lopetuspvm']);
                print("</p>");

                print("</li>");
            }
        print("</ol>");
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}