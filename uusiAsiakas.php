<!DOCTYPE html>
<html>
<head>
<title>Bussiliikenne</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <section class="container">
        <form action="index.php">
            <input type="submit" class="btn btn-secondary" value="Asiakkaat" />
        </form>
        <h1><i>Oulun Tilausajot</i></h1>
        <h3>Lisää asiakas:</h3>
        <form action="lisaaAsiakas.php" method="POST">
        <div>
            <label class="form-label">Nimi: </label>
            <input type="text" name="nimi" maxlength="50" required />
        </div>
        <div>
            <label class="form-label">Puhelin: </label>
            <input type="text" name="puh" maxlength="13" required />
        </div>
        <div>
            <label class="form-label">Sähköposti: </label>
            <input type="text" name="sahkoposti" maxlength="50" />
        </div>
        <input type="submit" value="Lisää uusi asiakas" class="btn btn-primary" />
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>