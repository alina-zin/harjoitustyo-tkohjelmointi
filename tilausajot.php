<!DOCTYPE html>
<html>
<head>
<title>Bussiliikenne</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <section class="container">
        <h1><i>Oulun Tilausajot</i></h1>
        <div class="justify-content-around">
            <form action="index.php">
                <input type="submit" value="Asiakkaat" class="btn btn-primary form-label" />
            </form>
            <form action="tyontekijat.php">
                <input type="submit" value="Työntekijät" class="btn btn-primary form-label" />
            </form>
            <form action="uusiTilaus.php">
                <input type="submit" value="Lisää uusi tilausajo" class="btn btn-warning form-label" />
            </form>
        </div>
        <h3>Kaikki tilausajot:</h3>
        <?php
            $servername = "localhost";
            $username = "harjoitustyoUser";
            $password = "tIPOgJc85ThmqgJb";
            $dbname= "bussiliikenne";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT * FROM tilausajo");
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $row) {
                    print("<hr style='width:25%;border:blue solid'>");

                    print("<p>");
                    print("<b>Tilausnro: </b>");
                    print($row['tilausnro']);
                    print("</p>");

                    print("<p>");
                    print("<b>Asiakasnro: </b>");
                    print($row['asiakastunnus']);
                    print("</p>");

                    print("<p>");
                    print("<b>Kuljettajan tunnus: </b>");
                    print($row['tyontektunnus']);
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
                    
                    $tilausnro = $row['tilausnro'];
                    $asiakastunnus = $row['asiakastunnus'];
                    $tyontektunnus = $row['tyontektunnus'];
                    $ajoneuvo_nro = $row['ajoneuvo_nro'];
                    $asiakasmaara = $row['asiakasmaara'];
                    $lähtöpaikka = $row['lähtöpaikka'];
                    $maali = $row['maali'];
                    $aloitusaika = $row['aloitusaika'];
                    $lopetusaika = $row['lopetusaika'];

                    print("<a href='muokkaaTilaus.php?tilausnro=$tilausnro'>Muokkaa tilaus</a>");
                    print("&nbsp; | &nbsp;");

                    print("<a href='poistaTilaus.php?tilausnro=$tilausnro'>Poista tilaus</a>");
                    print("&nbsp; | &nbsp;");

                }

            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

