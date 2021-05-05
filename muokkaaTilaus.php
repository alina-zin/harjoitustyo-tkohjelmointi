<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tilausnro = filter_input(INPUT_GET,'tilausnro',FILTER_SANITIZE_NUMBER_INT);
    $asiakastunnus = filter_input(INPUT_GET,'asiakastunnus',FILTER_SANITIZE_NUMBER_INT);
    $tyontektunnus = filter_input(INPUT_GET,'tyontektunnus',FILTER_SANITIZE_NUMBER_INT);
    $ajoneuvo_nro = filter_input(INPUT_GET,'ajoneuvo_nro',FILTER_SANITIZE_NUMBER_INT);
    $asiakasmaara = filter_input(INPUT_GET,'asiakasmaara',FILTER_SANITIZE_NUMBER_INT);
    $lahtopaikka = filter_input(INPUT_GET,'lähtöpaikka',FILTER_SANITIZE_STRING);
    $aloitusaika = filter_input(INPUT_GET,'aloitusaika',FILTER_SANITIZE_STRING);
    $lopetusaika = filter_input(INPUT_GET,'lopetusaika',FILTER_SANITIZE_STRING);
    $maali = filter_input(INPUT_GET,'maali',FILTER_SANITIZE_STRING);
    ?>
    <html>
        <head>
        <title>Bussiliikenne</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        </head>
        <body>
        <section class="container">
            <form action="tilausajot.php">
                <input type="submit" class="btn btn-secondary" value="Etusivulle" />
            </form>
            <h3>Muokkaa tilauksen tietoja:</h3>
            <form action="paivitaTilaus.php" method="POST">
                <div>
                    <input type="hidden" name="tilausnro" value="<?php print $tilausnro;?>" />
                </div>
                <div>
                    <label class="form-label">Asiakastunnus: </label>
                    <input type="number" name="asiakastunnus" value="<?php print $asiakastunnus;?>" maxlength="4" required />
                </div>
                <div>
                    <label class="form-label">Työntekijä: </label>
                    <input type="number" name="tyontektunnus" value="<?php print $tyontektunnus;?>" maxlength="4" required />
                </div>
                <div>
                    <label class="form-label">AjoneuvoID: </label>
                    <input type="number" name="ajoneuvo_nro" value="<?php print $ajoneuvo_nro;?>" maxlength="4" required />
                </div>
                <div>
                    <label class="form-label">Asiakasmäärä: </label>
                    <input type="number" name="asiakasmaara" value="<?php print $asiakasmaara;?>" maxlength="4" required />
                </div>
                <div>
                    <label class="form-label">Mistä: </label>
                    <input type="text" name="lähtöpaikka" value="<?php print $lahtopaikka;?>" maxlength="255" required />
                </div>
                <div>
                    <label class="form-label">Lähtöaika: </label>
                    <input type="text" name="aloitusaika" value="<?php print $aloitusaika;?>" maxlength="30" />
                </div>
                <div>
                    <label class="form-label">Minne: </label>
                    <input type="text" name="maali" value="<?php print $maali;?>" maxlength="255" />
                </div>
                <div>
                    <label class="form-label">Lopetusaika: </label>
                    <input type="text" name="lopetusaika" value="<?php print $lopetusaika;?>" maxlength="30" />
                </div>
            <input type="submit" class="btn btn-primary" value="Päivitä tilaus" />
            </form>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        </body>
    </html>
<?php
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>