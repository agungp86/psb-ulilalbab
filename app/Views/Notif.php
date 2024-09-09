<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body>
    <header class="d-flex justify-content-between align-items-center p-3 bg-primary text-light">
        <!-- Logo on the left corner -->
        <div class="d-flex align-items-center">
            <div class="bg-white rounded-circle p-3">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" style="height: 50px;">
            </div>
            <div class="ms-3">
                <h3 class="mb-0">Penerimaan Santri Baru</h3>
                <strong>Pondok Pesantren Ulil Albab Karanganyar</strong>
            </div>
        </div>
    </header>
    <div class="content">
        <?= $content ?>
    </div>
</body>

</html>