<!DOCTYPE html>
<html>
<head>
<title>Bussiliikenne</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <section class="container">
        <form action="tilausajot.php">
            <input type="submit" class="btn btn-secondary" value="Tilausajot" />
        </form>
        <h1><i>Oulun Tilausajot</i></h1>
        <h3>Lisää uusi tilaus:</h3>
                <form action="lisaaTilaus.php" method="POST">
                <div>
                    <label class="form-label">Asiakastunnus: </label>
                    <input type="number" name="asiakastunnus" maxlength="5" required />
                </div>
                <div>
                    <label class="form-label">Työntekijätunnus: </label>
                    <input type="number" name="tyontektunnus" maxlength="5" required />
                </div>
                <div>
                    <label class="form-label">Ajoneuvo ID: </label>
                    <input type="number" name="ajoneuvo_nro" maxlength="11" required />
                </div>
                <div>
                    <label class="form-label">Asiakasmäärä: </label>
                    <input type="number" name="asiakasmaara" maxlength="3" required />
                </div>
                <div>
                    <label class="form-label">Mistä: </label>
                    <input type="text" name="lähtöpaikka" maxlength="255" required />
                </div>
                <div>
                    <label class="form-label">Lähtöaika (YYYY-MM-DD): </label>
                    <input type="text" name="aloitusaika" maxlength="50" required />
                </div>
                <div>
                    <label class="form-label">Minne: </label>
                    <input type="text" name="maali" maxlength="255" required />
                </div>
                <div>
                    <label class="form-label">Lopetusaika (YYYY-MM-DD): </label>
                    <input type="text" name="lopetusaika" maxlength="50" required />
                </div>
            <input type="submit" value="Lisää uusi tilaus" class="btn btn-primary" />
        </form>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>