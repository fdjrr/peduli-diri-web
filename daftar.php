<?php

require_once __DIR__ . '/app/init.php';

$db = new Database;

if (isset($_POST["submit"])) {
    $nik = filter_input(INPUT_POST, "nik", FILTER_SANITIZE_STRING);
    $nama_lengkap = filter_input(INPUT_POST, "nama_lengkap", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    $query = "INSERT INTO `pengguna` (`id`, `nik`, `nama_lengkap`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, :nik, :nama_lengkap, :password, current_timestamp(), current_timestamp(), NULL);";
    $db->query($query);
    $db->bind(":nik", $nik);
    $db->bind(":nama_lengkap", $nama_lengkap);
    $db->bind(":password", password_hash($password, PASSWORD_DEFAULT));
    $db->execute();
    if ($db->rowCount() > 0) {
        echo "<script>window.location.replace('" . BASE_URL . "/login.php');</script>";
    } else {
        echo "<script>window.location.replace('" . BASE_URL . "/daftar.php');</script>";
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

    <title>Daftar &ndash; Peduli Diri</title>

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
                        <input type="text" name="nama_lengkap" class="form-control" id="floatingNama" value="" required>
                        <label for="floatingNama">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" value=""
                            required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary float-end">Daftar</button>
                    <a href="<?= BASE_URL; ?>/login.php" class="float-end p-1 text-muted me-1"><small>Sudah Punya
                            Akun</small></a>
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