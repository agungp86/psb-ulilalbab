<style>
    @media (min-width: 768px) {
        .zoom {
            display: inline-block;
            /* Ensure that the image scales from the center */
            transform-origin: center right;
            transition: transform 0.3s ease;
            /* Smooth transition */
        }

        .zoom:hover {
            -ms-transform: scale(2);
            /* IE 9 */
            -webkit-transform: scale(2);
            /* Safari 3-8 */
            transform: scale(2);
            /* Scale up the image */
        }
    }
</style>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-9 mb-3">
            <div class="card border-primary">
                <div class="card-header text-bg-primary">
                    Detail data pendaftaran
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fw-medium">Nama</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['nama'] ?></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="fw-medium">Jenis kelamin</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['jk'] ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fw-medium">Tempat tanggal lahir</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></div>
                        </div>
                    </div>
                    <!-- <div class="row ">
                        <div class="col-md-3">
                            <div class="fw-medium">NISN</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['nisn'] ?></div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fw-medium">Nama Orangtua</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['ortu'] ?></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="fw-medium">Alamat</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['detail_alamat'] ?><br>
                                <?= $siswa['kelurahan1'] ?>, <?= $siswa['kec1'] ?>, <?= $siswa['kabko1'] ?>, <?= $siswa['prov1'] ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fw-medium">Telepon</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['telp_ortu'] ?></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fw-medium">Sekolah Asal</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['nama_sekolah'] ?></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="fw-medium">Alamat Sekolah</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['kelurahan2'] ?>, <?= $siswa['kec2'] ?>, <?= $siswa['kabko2'] ?>, <?= $siswa['prov2'] ?></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="fw-medium">Jalur Pendaftaran</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['jalur'] ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fw-medium">Tahun Ajaran</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['tahunajar'] ?></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="fw-medium">Nomor Registrasi</div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-start">: <?= $siswa['noreg'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary">Edit Data Pendaftaran</button>
                        </div>
                        <div class="col-md-6 d-grid gap-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Hapus Data Pendaftaran
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <?php $status = ($siswa['bukti_tf'] == 'empty.jpg') ? 'secondary' : 'success' ?>
            <?php switch ($siswa['stage']) {
                case '0':
                    $status = 'secondary';
                    break;

                case '1':
                    $status = 'success';
                    break;

                case '2':
                    $status = 'primary';
                    break;

                default:
                    $status = 'light';
                    break;
            } ?>
            <div class="card border-<?php echo $status ?> mb-3">
                <div class="card-header text-bg-<?php echo $status ?>">Status Pembayaran</div>
                <div class="card-body">
                    <?php if ($siswa['stage'] == 1) { ?>
                        <strong class="card-title">Konfirmasi bukti tranfer</strong>
                        <p class="card-text">Peserta telah mengirimkan bukti transfer</p>
                        <div class="d-grid gap-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Konfirmasi Pembayaran
                            </button>
                        </div>
                    <?php } elseif ($siswa['stage'] == 2) { ?>
                        <p class="card-text">Pembayaran telah dikonfirmasi sebelumnya</p>
                        <img src="<?= base_url('uploads/buktitf/') . $siswa['bukti_tf'] ?>" class="zoom" style="max-width: 100%;" alt="bukti tf">
                    <?php } else { ?>
                        <h5 class="card-title">Belum ada bukti transfer</h5>
                        <p class="card-text">Peserta belum mengirimkan bukti transfer</p>
                    <?php } ?>
                    <?php ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Bukti Tranfer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('uploads/buktitf/') . $siswa['bukti_tf'] ?>" style="max-width: 100%;" alt="bukti tf">
            </div>
            <div class="modal-footer">
                <label class="form-check-label" for="termsCheckbox">
                    Konfirmasi pembayaran
                </label>
                <input class="form-check-input" type="checkbox" id="termsCheckbox">
                <form action="<?= base_url('verifikasiTf') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Konfirmasi</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header outline-danger">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Pendaftaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <label for="textInput">Ketik "bismillah" untuk menghapus data</label>
                    <input type="text" class="form-control" id="textInput" onkeyup="checkInput()" />
                    <div class="d-grid gap-2 mt-1">
                        <input type="submit" class="btn btn-danger" id="submitHapus" value="Submit" disabled />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('termsCheckbox').addEventListener('change', function() {
        document.getElementById('submitButton').disabled = !this.checked;
    });

    function checkInput() {
            const inputText = document.getElementById("textInput").value;
            const submitButton = document.getElementById("submitHapus");

            if (inputText.toLowerCase() === "bismillah") {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
</script>