<?php
$servername = "localhost";
$username = "harjoitustyoUser";
$password = "tIPOgJc85ThmqgJb";
$dbname= "bussiliikenne";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tyontektunnus = filter_input(INPUT_GET,'tyontektunnus',FILTER_SANITIZE_NUMBER_INT);
    $nimi = filter_input(INPUT_GET,'nimi',FILTER_SANITIZE_STRING);
    $puh = filter_input(INPUT_GET,'puh',FILTER_SANITIZE_STRING);
    $henktunnus = filter_input(INPUT_GET,'henktunnus',FILTER_SANITIZE_STRING);

    print('<form action="paivitaTyontek.php" method="POST">
    <div>
    <input type="hidden" name="tyontektunnus" value="'.$tyontektunnus.'" />
    </div>
    <div>
        <label>Nimi: </label>
        <input type="text" name="nimi" value="'.$nimi.'" maxlength="50" required />
    </div>
    <div>
        <label>Puhelin: </label>
        <input type="text" name="puh" value="' . $puh . '" maxlength="13" required />
    </div>
    <div>
        <label>Henkilötunnus: </label>
        <input type="text" name="henktunnus" value="' . $henktunnus . '" maxlength="11" required />
    </div>
    <input type="submit" value="Päivitä tiedot" />
    </form>');

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}