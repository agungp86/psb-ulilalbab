<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Bayar Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <div class="container">
        <h1 class="my-3">Upload Bukti Bayar Pendaftaran</h1>
        <div class="row">
            <div class="col-md-6 pt-3">
                <div class="card">
                    <div class="card-header">
                        <strong class="mt1">Terima kasih telah mengisi biodata pendaftaran</strong>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?php echo $nama ?></td>
                            </tr>
                            <tr>
                                <td>Jalur Masuk</td>
                                <td>:</td>
                                <td><?php echo $jalur ?></td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>:</td>
                                <td><?php echo $nama_sekolah ?></td>
                            </tr>
                            <tr>
                                <td>Nama Orang Tua</td>
                                <td>:</td>
                                <td><?php echo $ortu ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:</td>
                                <td><?= substr($telp_ortu, 0, 7) . str_repeat('*', strlen($telp_ortu) - 7) ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Pendaftaran</td>
                                <td>:</td>
                                <td><?php echo $noreg ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-3">
                <div class="card">
                    <div class="card-header">
                        <strong class="mt-1">Upload Bukti Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <strong> Proses selanjutnya adalah pembayaran biaya pendaftaran.</strong>
                            <br>
                            <br>
                            <p> Silahkan melakukan pembayaran biaya pendaftaran sebesar <strong>Rp.300.000,-</strong> dengan transfer ke nomor rekening Bank Syariah Indonesia (BSI) <button class="btn btn-outline-secondary btn-sm" onclick="copyToClipboard()"><strong>5777-5777-53 </strong><i class="fa-regular fa-clone"></i></button> atas nama SMPIT Ulil Albab atau pembayaran cash dengan datang langsung ke kantor Pesantren Ulil Albab Karanganyar.
                                Informasi lebih lanjut hubungi admin 0896-0258-6549
                                <button class="btn btn-outline-success btn-sm" onclick="window.open('https://wa.me/6289602586549', '_blank')">
                                    <i class="fa-brands fa-whatsapp"></i> Chat </button>
                        </div>

                        <form action="<?php echo base_url('uploadBuktiTf') ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="bukti">Bukti Pembayaran</label>
                                    <input type="file" name="bukti" accept=".jpg, .jpeg, .png" class="form-control" id="bukti" onchange="checkFile()">
                                    <input type="hidden" name="par1" value="<?php echo $noreg ?>">
                                    <input type="hidden" name="par2" value="<?php echo $tgl_lahir ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitBtn" disabled onclick="showAlert(event)">Upload</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script>
            function copyToClipboard() {
                const textToCopy = "5777577753";
                const tempInput = document.createElement("input");
                document.body.appendChild(tempInput);
                tempInput.value = textToCopy;
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
                alert("Nomor rekening disalin ke papan klip : 5777577753");
            }

            function checkFile() {
                const fileInput = document.getElementById('bukti');
                const submitBtn = document.getElementById('submitBtn');
                submitBtn.disabled = !fileInput.value;
            }

            function showAlert(event) {
                const submitBtn = document.getElementById('submitBtn');
                if (submitBtn.disabled) {
                    event.preventDefault();
                    alert("Please attach a file before submitting.");
                }
            }
        </script>
</body>

</html>