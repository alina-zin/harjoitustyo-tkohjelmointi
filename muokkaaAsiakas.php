<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $asiakastunnus = filter_input(INPUT_GET,'asiakastunnus',FILTER_SANITIZE_NUMBER_INT);
    $nimi = filter_input(INPUT_GET,'nimi',FILTER_SANITIZE_STRING);
    $puh = filter_input(INPUT_GET,'puh',FILTER_SANITIZE_STRING);
    $sahkoposti = filter_input(INPUT_GET,'sahkoposti',FILTER_SANITIZE_STRING);
    ?>
    <html>
        <head>
        <title>Bussiliikenne</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        </head>
        <body>
        <section class="container">
            <form action="index.php">
                <input type="submit" class="btn btn-secondary" value="Etusivulle" />
            </form>
            <h3>Muokkaa asiakastietoja:</h3>
            <form action="paivitaAsiakas.php" method="POST">
                <div>
                    <input type="hidden" name="asiakastunnus" value="<?php print $asiakastunnus;?>" />
                </div>
                <div>
                    <label class="form-label">Nimi: </label>
                    <input type="text" name="nimi" value="<?php print $nimi;?>" maxlength="20" required />
                </div>
                <div>
                    <label class="form-label">Puhelin: </label>
                    <input type="text" name="puh" value="<?php print $puh;?>" maxlength="15" />
                </div>
                <div>
                    <label class="form-label">Postinumero: </label>
                    <input type="text" name="sahkoposti" value="<?php print $sahkoposti;?>" maxlength="5" />
                </div>
            <input type="submit" class="btn btn-primary" value="Päivitä tiedot" />
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