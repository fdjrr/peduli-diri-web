<?php

require_once __DIR__ . './app/init.php';

if (!isset($_SESSION["loggined"])) {
    echo "<script>window.location.replace('" . BASE_URL . "/login.php');</script>";
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.kawalcorona.com/indonesia/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode((curl_exec($ch)));
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Peduli Diri &ndash; Catatan Perjalanan</title>

    <!-- CSS Components -->
    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/navbar.css">
    <link rel="stylesheet" href="./assets/css/container.css">
    <link rel="stylesheet" href="./assets/css/breadcrumb.css">
    <link rel="stylesheet" href="./assets/css/card.css">
    <link rel="stylesheet" href="./assets/css/buttons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">

</head>

<body class="bg-light">
    <!-- Navbar Section Start -->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3">
            <div class="container">
                <a class="navbar-brand" href="<?= BASE_URL; ?>">Peduli Diri</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="<?= BASE_URL; ?>">Home</a>
                        <a class="nav-link" href="<?= BASE_URL; ?>/catatan-perjalanan">Catatan Perjalanan</a>
                        <a class="nav-link" href="<?= BASE_URL; ?>/isi-data">Isi Data</a>
                        <a class="nav-link" href="<?= BASE_URL; ?>/logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!-- Navbar Section End -->

    <!-- Container Section Start -->
    <div class="container mt-4">
        <!-- Row Content Section Start -->
        <div class="row">
            <div class="col-3">
                <!-- Figure Logo Section Start -->
                <figure>
                    <img src="./assets/img/covid-19.png" class="mb-2" alt="Covid 19" width="160px">
                    <figcaption>Informasi tentang COVID-19 di Indonesia</figcaption>
                </figure>
                <!-- Figure Logo Section End -->
                <!-- Card Section Start -->
                <div class="card border-0">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Positif &ndash; <?= $output[0]->positif ?></li>
                            <li class="list-group-item">Sembuh &ndash; <?= $output[0]->sembuh ?></li>
                            <li class="list-group-item">Meninggal &ndash; <?= $output[0]->meninggal ?></li>
                            <li class="list-group-item">Dirawat &ndash; <?= $output[0]->dirawat ?></li>
                        </ul>
                    </div>
                </div>
                <!-- Card Section End -->

            </div>
            <div class="col-9">
                <h1>Peduli Diri &ndash; Catatan Perjalanan</h1>
                <!-- Breadcrumbs Section Start -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= BASE_URL; ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-decoration-none"
                                href="<?= BASE_URL; ?>/catatan-perjalanan">Catatan Perjalanan</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= BASE_URL; ?>/isi-data">Isi
                                Data</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none"
                                href="<?= BASE_URL; ?>/logout">Logout</a></li>
                    </ol>
                </nav>
                <!-- Breadcrumbs Section End -->

                <?php
                if (isset($_GET["url"])) {
                    $url = filter_var($_GET["url"], FILTER_SANITIZE_URL);

                    if (file_exists("./view/" . $url . ".php")) {
                        require_once __DIR__ . './view/' . $url  . '.php';
                    } else {
                        require_once __DIR__ . './view/welcome.php';
                    }
                } else {
                    require_once __DIR__ . './view/welcome.php';
                }

                // var_dump($_GET["url"]);

                ?>
            </div>
        </div>
        <!-- Row Content Section End -->
    </div>
    <!-- Container Section End -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="./assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>