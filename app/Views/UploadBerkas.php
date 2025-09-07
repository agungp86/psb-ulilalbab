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
                'accept' => '.pdf,.jpg,.jpeg,.png',
                'folder' => 'akta',
            ],
            [
                'label' => 'Fotocopy KK',
                'name' => 'kk',
                'accept' => '.pdf,.jpg,.jpeg,.png',
                'folder' => 'kk',
            ],
            [
                'label' => 'Surat Keterangan',
                'name' => 'surat',
                'accept' => '.pdf,.jpg,.jpeg,.png',
                'folder' => 'surat',
            ],
            [
                'label' => 'Bukti Transfer Daftar Ulang',
                'name'  => 'bukti_tf_DU',
                'accept' => '.pdf,.jpg,.jpeg,.png',
                'folder' => 'bukti_tf_DU',
            ]
        ];
        $t = 0
        ?>
        <!-- ==== TOMBOL LANJUT KE STAGE 5 ==== -->
        <?php
        // jika semua nilai di $isUploaded adalah true
        if (isset($isUploaded) && $t != 4):
        ?>
            <div class="card w-100 mt-5 bg-danger p-2 text-dark bg-opacity-25">
                <div class="card-body">
                    <h5 class="card-title">Silahkan upload berkas yang belum di-upload</h5>
                </div>
            </div>
        <?php endif; ?>
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
                            <?php if ($isUploaded): $t++ ?>
                                <small class="badge text-bg-light mt-2 d-block">
                                    <a href="<?= base_url('uploads/' . $item['folder'] . '/' . $file) ?>" target="_blank">Lihat</a> berkas sebelumnya
                                </small>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>



        <!-- ==== TOMBOL LANJUT KE STAGE 5 ==== -->
        <?php
        // jika semua nilai di $isUploaded adalah true
        if (isset($isUploaded) && $t === 5):
        ?>
            <div class="card w-100 mt-5 bg-success p-2 text-dark bg-opacity-25">
                <div class="card-body">
                    <form action="<?= base_url('uploadBerkas/next') ?>" method="post">
                        <!-- Kirimkan ID terenkripsi -->
                        <input type="hidden" name="id" value="<?= $id ?>">

                        <!-- Checkbox konfirmasi -->
                        <div class="form-check mb-3">
                            <input class="form-check-input"
                                type="checkbox"
                                id="confirmCheck">
                            <label class="form-check-label" for="confirmCheck">
                                Saya yakin telah meng-upload semua berkas dengan benar
                            </label>
                        </div>

                        <!-- Tombol submit, disabled by default -->
                        <button type="submit" id="nextButton" class="btn btn-success w-100 disabled">
                            Selesaikan Pendaftaran
                        </button>
                    </form>
                </div>
            </div>

            <!-- Script kecil untuk enable/disable tombol -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('nextForm');
                    const check = document.getElementById('confirmCheck');
                    const btn = document.getElementById('nextButton');

                    // Toggle class .disabled untuk styling saja
                    check.addEventListener('change', function() {
                        if (this.checked) {
                            btn.classList.remove('disabled');
                        } else {
                            btn.classList.add('disabled');
                        }
                    });

                    // Cegah submit dan tampilkan hint jika checkbox belum dicek
                    form.addEventListener('submit', function(e) {
                        if (!check.checked) {
                            e.preventDefault();
                            alert('Harap centang kotak persetujuan sebelum melanjutkan.');
                        }
                    });
                });
            </script>
        <?php endif; ?>

    </div>
</div>