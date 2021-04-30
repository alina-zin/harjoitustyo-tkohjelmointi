<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $asiakastunnus = filter_input(INPUT_GET,'asiakastunnus',FILTER_SANITIZE_STRING);
    $nimi = filter_input(INPUT_GET,'nimi',FILTER_SANITIZE_STRING);
    $puh = filter_input(INPUT_GET,'puh',FILTER_SANITIZE_STRING);
    $sahkoposti = filter_input(INPUT_GET,'sahkoposti',FILTER_SANITIZE_STRING);

    print('<form action="paivitaAsiakas.php" method="POST">
    <div>
    <input type="hidden" name="asiakastunnus" value="'.$asiakastunnus.'" />
    </div>
    <div>
        <label>Nimi: </label>
        <input type="text" name="nimi" value="'.$nimi.'" maxlength="20" required />
    </div>
    <div>
        <label>Puhelin: </label>
        <input type="text" name="puh" value="' . $puh . '" maxlength="15" />
    </div>
    <div>
        <label>Postinumero: </label>
        <input type="text" name="sahkoposti" value="' . $sahkoposti . '" maxlength="5" />
    </div>
    <input type="submit" value="Päivitä tiedot" />
    </form>');

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}