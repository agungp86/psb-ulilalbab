<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

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