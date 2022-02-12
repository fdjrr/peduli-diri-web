<?php

require_once __DIR__ . '/app/init.php';

$db = new Database;

if (isset($_POST["submit"])) {
    $nik = filter_input(INPUT_POST, "nik", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    $query = "SELECT * FROM `pengguna` WHERE `pengguna`.`nik` = :nik";
    $db->query($query);
    $db->bind(":nik", $nik);
    $db->execute();
    if ($db->rowCount() > 0) {
        $result = $db->single();
        if (password_verify($password, $result["password"])) {
            $_SESSION["loggined"] = [
                "nama_lengkap" => $result["nama_lengkap"],
                "id" => $result["id"]
            ];
            echo "<script>window.location.replace('" . BASE_URL . "');</script>";
        } else {
            echo "<script>window.location.replace('" . BASE_URL . "/login.php');</script>";
        }
        die;
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login &napos; Peduli Diri</title>

    <!-- Custom Login CSS -->
    <link rel="stylesheet" href="./signin.css">

</head>

<body class="bg-light text-center">
    <div class="container">
        <img src="./assets/img/covid-19.png" alt="" class="img-fluid" width="180px">
        <div class="card border-0 mt-3">
            <div class="card-body">
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="number" name="nik" class="form-control" id="floatingNIK" value="" required>
                        <label for="floatingNIK">Nomor Induk Kewarganegaraan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" value=""
                            required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary float-end">Masuk</button>
                    <a href="<?= BASE_URL ?>/daftar.php" class="float-end p-1 text-muted me-1"><small>Saya Pengguna
                            Baru</small></a>
                </form>
            </div>
        </div>
        <div class="mt-3 font-monospace fst-italic text-muted"><small>Developer by Fadjrir Herlambang</small></div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="./assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>