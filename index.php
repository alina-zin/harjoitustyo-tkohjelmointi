<!DOCTYPE html>
<html>
<head>
<title>Bussiliikenne</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <section>
        <h1><i>Oulun bussifirma</i></h1>
        <form action="tyontekijat.php">
            <input type="submit" value="Työntekijät" class="btn btn-primary form-label" />
        </form>
        <form action="tilausajot.php">
            <input type="submit" value="Tilausajot" class="btn btn-primary form-label" />
        </form>
        <form action="uusiAsiakas.php">
            <input type="submit" value="Uusi asiakas" class="btn btn-warning form-label" />
        </form>


    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM asiakas");
    $stmt->execute();

    $result = $stmt->fetchAll();

    foreach($result as $row) {
        print("<hr/>");

        print("<p>");
        print("<b>Asiakastunnus: </b>");
        print($row['asiakastunnus']);
        print("</p>");

        print("<p>");
        print("<b>Nimi: </b>");
        print($row['nimi']);
        print("</p>");

        print("<p>");
        print("<b>Puhelin: </b>");
        print($row['puh']);
        print("</p>");

        print("<p>");
        print("<b>Sähköposti: </b>");
        print($row['sahkoposti']);
        print("</p>");

    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>