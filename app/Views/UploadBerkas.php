<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-2 g-4">

        <?php
        $daftarBerkas = [
            [
                'label' => 'Foto',
                'name' => 'foto',
                'accept' => '.jpeg,.jpg',
                'folder' => 'foto',
            ],
            [
                'label' => 'Fotocopy Akta',
                'name' => 'akta',
                'accept' => '.pdf',
                'folder' => 'akta',
            ],
            [
                'label' => 'Fotocopy KK',
                'name' => 'kk',
                'accept' => '.pdf',
                'folder' => 'kk',
            ],
            [
                'label' => 'Surat Keterangan',
                'name' => 'surat',
                'accept' => '.pdf',
                'folder' => 'surat',
            ],
        ];
        ?>

        <?php foreach ($daftarBerkas as $item): ?>
            <?php
                $file = $berkas[$item['name']] ?? null;
                $isUploaded = !empty($file);
                $borderClass = $isUploaded ? 'border-success' : 'border-danger';
                $icon = $isUploaded 
                    ? '<i class="fa-solid fa-square-check text-success"></i>' 
                    : '<i class="fa-solid fa-square-xmark text-danger"></i>';
            ?>
            <div class="col">
                <div class="card h-100 <?= $borderClass ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            Upload <?= $item['label'] ?> <?= $icon ?>
                        </h5>
                        <form action="<?= base_url('berkas/upload/' . $item['name']) ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="mb-3">
                                <input type="file" accept="<?= $item['accept'] ?>" class="form-control" name="<?= $item['name'] ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Upload</button>
                            <?php if ($isUploaded): ?>
                                <small class="badge text-bg-light mt-2 d-block">
                                    <a href="<?= base_url('uploads/' . $item['folder'] . '/' . $file) ?>" target="_blank">Lihat</a> berkas sebelumnya
                                </small>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>