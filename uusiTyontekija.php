<!DOCTYPE html>
<html>
<head>
<title>Bussiliikenne</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<form action="tyontekijat.php">
    <input type="submit" class="btn btn-secondary" value="Etusivu" />
</form>
        <h1><i>Oulun bussifirma</i></h1>
        <h3>Lisää uusi työntekijä:</h3>
        <form action="lisaaTyontek.php" method="POST">
        <div>
            <label class="form-label">Nimi: </label>
            <input type="text" name="nimi" maxlength="50" required />
        </div>
        <div>
            <label class="form-label">Puhelin: </label>
            <input type="text" name="puh" maxlength="13" required />
        </div>
        <div>
            <label class="form-label">Henkilötunnus: </label>
            <input type="text" name="henktunnus" maxlength="11" required />
        </div>
        <input type="submit" value="Lisää uusi työntekijä" class="btn btn-primary" />
        </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>