<?php

$db = new Database;

$id_pengguna = $_SESSION["loggined"]["id"];


if (isset($_POST["view"])) {
    if ($_POST["view"] == "all") {
        $query = "SELECT * FROM `perjalanan` WHERE `perjalanan`.`deleted_at` IS NULL AND `perjalanan`.`id_pengguna` = :id_pengguna ORDER BY `perjalanan`.`id` DESC";
        $db->query($query);
        $db->bind("id_pengguna", $id_pengguna);
        $data = $db->resultSet();
    }
} else {
    $query = "SELECT * FROM `perjalanan` WHERE `perjalanan`.`deleted_at` IS NULL AND `perjalanan`.`id_pengguna` = :id_pengguna ORDER BY `perjalanan`.`id` DESC LIMIT 5";
    $db->query($query);
    $db->bind("id_pengguna", $id_pengguna);
    $data = $db->resultSet();
}



?>

<!-- Card Section Start -->
<div class="card border-0 mb-3">
    <div class="card-body">
        Tetap Prokes dengan mematuhi protokol kesehatan.
    </div>
</div>
<!-- Card Section End -->

<!-- Card Section Start -->
<div class="card border-0 mb-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Suhu Tubuh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) : ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td class="font-monospace"><?= $value["tanggal"] ?></td>
                        <td class="font-monospace"><?= $value["waktu"] ?></td>
                        <td><?= $value["lokasi"] ?></td>
                        <td><?= $value["suhu_tubuh"] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="float-end">
            <form action="" method="POST">
                <button type="submit" name="view" value="all" class="btn text-muted">View All
                    Data</button>
            </form>
        </div>
    </div>
</div>
<!-- Card Section End -->
<a href="<?= BASE_URL; ?>/isi-data" class="btn btn-sm btn-primary float-end p-2">Isi Catatan Perjalanan</a>