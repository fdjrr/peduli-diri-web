<!-- Card Section Start -->
<div class="card border-0 mb-3">
    <div class="card-body p-4">
        Selamat Datang <span
            class="fw-bold text-decoration-underline"><?= $_SESSION["loggined"]["nama_lengkap"] ?></span> di aplikasi
        Peduli
        Diri.
    </div>
</div>
<!-- Card Section End -->

<a href="<?= BASE_URL; ?>/isi-data" class="btn btn-sm btn-primary float-end p-2">Isi Catatan Perjalanan</a>