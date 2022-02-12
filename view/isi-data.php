<?php

$db = new Database;

if (isset($_POST["submit"])) {
    $id_pengguna = $_SESSION["loggined"]["id"];
    $tanggal = filter_input(INPUT_POST, "tanggal", FILTER_SANITIZE_STRING);
    $waktu = filter_input(INPUT_POST, "waktu", FILTER_SANITIZE_STRING);
    $lokasi = filter_input(INPUT_POST, "lokasi", FILTER_SANITIZE_STRING);
    $suhu_tubuh = filter_input(INPUT_POST, "suhu_tubuh", FILTER_SANITIZE_STRING);

    $query = "INSERT INTO `perjalanan` (`id`, `id_pengguna`, `tanggal`, `waktu`, `lokasi`, `suhu_tubuh`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, :id_pengguna, :tanggal, :waktu, :lokasi, :suhu_tubuh, current_timestamp(), current_timestamp(), NULL);";
    $db->query($query);
    $db->bind(":id_pengguna", $id_pengguna);
    $db->bind(":tanggal", $tanggal);
    $db->bind(":waktu", $waktu);
    $db->bind(":lokasi", $lokasi);
    $db->bind(":suhu_tubuh", $suhu_tubuh);
    $db->execute();
    if ($db->rowCount() > 0) {
        echo "<script>window.location.replace('" . BASE_URL . "/catatan-perjalanan');</script>";
    }
}

?>

<!-- Card Section Start -->
<div class="card border-0 mb-3">
    <div class="card-body">
        <form method="POST">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="inputTanggal" class="form-label">Tanggal Hari Ini</label>
                        <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>"
                            class="form-control font-monospace" id="inputTanggal">
                    </div>
                    <div class="mb-3">
                        <label for="inputWaktu" class="form-label">Waktu Hari Ini</label>
                        <input type="time" value="<?= date("H:i:s") ?>" name="waktu" class="form-control font-monospace"
                            id="inputWaktu">
                        <div class="form-text">WARNING : Tanggal dan Waktu sudah terisi otomatis, anda juga bisa
                            mengubah Tanggal dan Waktu tersebut.</div>

                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="inputLokasi" class="form-label">Lokasi yang dikunjungi</label>
                        <input type="text" name="lokasi" class="form-control" id="inputLokasi" required>
                        <div class="form-text">Mohon inputkan lokasi anda dengan benar.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputSuhu" class="form-label">Suhu Tubuh</label>
                        <input type="text" name="suhu_tubuh" class="form-control" id="inputSuhu" required>
                        <div class="form-text">Mohon inputkan Suhu Tubuh anda dari hasil alat tes dengan benar.</div>
                    </div>
                </div>
            </div>
            <button name="submit" type="submit" class="btn btn-primary float-end">Simpan</button>
            <a class="float-end text-decoration-none text-muted p-2 me-2" href="<?= BASE_URL; ?>">Kembali</a>
        </form>
    </div>
</div>
<!-- Card Section End -->