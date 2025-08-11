<div class="container container-fluid mt-3 justify-content-center">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('dashboard') ?>">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('form') ?>">Form</a>
                </li>
            </ul>
            <form action="<?= base_url('logout') ?>" method="get">
                <button type="submit" class="btn btn-outline-secondary">
                    Log Out
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>

        <div class="card-body p-3">
            <table id="studentTable" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Tahun Ajaran</th>
                        <th>Asal Sekolah</th>
                        <th>Jalur</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($record as $index => $k) { ?>
                        <tr>
                            <td><input type="checkbox" class="checkItem" value="<?= $k['id'] ?>"></td>
                            <td><?= $index + 1 ?></td>
                            <td>
                                <?= $k['nama'] ?><br>
                                <small><?= (new \DateTime($k['created_at']))->format('d-m-y H:i') ?></small>
                            </td>
                            <td><?= $k['tahunajar'] ?></td>
                            <td><?= $k['nama_sekolah'] ?></td>
                            <td><?= $k['jalur'] ?></td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.open('<?= base_url('detail_siswa/' . $k['id']) ?>', '_blank')">
                                    <i class="fa-solid fa-maximize"></i>
                                </button>
                                <?php
                                switch ($k['stage']) {
                                    case 0: echo '<span class="badge text-bg-secondary">belum bayar</span>'; break;
                                    case 1: echo '<span class="badge text-bg-success">sudah bayar</span>'; break;
                                    case 2: echo '<span class="badge text-bg-primary">terkonfirmasi</span>'; break;
                                    case 3: echo '<span class="badge text-bg-info">lulus wawancara</span>'; break;
                                    case 4: echo '<span class="badge text-bg-warning">lulus seleksi</span>'; break;
                                    case 5: echo '<span class="badge text-bg-success">berkas lengkap</span>'; break;
                                    default: echo '<span class="badge text-bg-danger">Tidak ditemukan</span>'; break;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="<?= base_url('downloadExcel') ?>" class="btn btn-outline-success">Download Excel</a>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#aksiModal">
                Aksi Massal
            </button>
        </div>
    </div>
</div>

<!-- Modal Aksi Massal -->
<div class="modal fade" id="aksiModal" tabindex="-1" aria-labelledby="aksiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="massActionForm">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aksiModalLabel">Pilih Aksi Massal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ids" id="selectedIds">
                    <div class="mb-3">
                        <label class="form-label">Aksi</label>
                        <select name="action" class="form-select" required>
                            <option value="">-- Pilih Aksi --</option>
                            <option value="download">Download Kolektif</option>
                            <!-- <option value="delete">Hapus Kolektif</option> -->
                        </select>
                    </div>
                    <p class="text-muted small">Pastikan sudah memilih siswa di tabel sebelum menekan tombol konfirmasi.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Jalankan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Check/uncheck all
    document.getElementById('checkAll').addEventListener('click', function() {
        document.querySelectorAll('.checkItem').forEach(cb => cb.checked = this.checked);
    });

    // Kirim ID terpilih ke modal
    document.getElementById('massActionForm').addEventListener('submit', function(e) {
        const selected = Array.from(document.querySelectorAll('.checkItem:checked')).map(cb => cb.value);
        if (selected.length === 0) {
            e.preventDefault();
            alert('Pilih minimal satu siswa.');
            return;
        }
        document.getElementById('selectedIds').value = selected.join(',');
        this.action = (document.querySelector('[name="action"]').value === 'download')
            ? "<?= base_url('download/bulk') ?>"
            : "<?= base_url('siswa/deleteBulk') ?>";
    });
</script>
