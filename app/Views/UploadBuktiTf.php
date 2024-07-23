<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Bayar Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Upload Bukti Bayar Pendaftaran</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt1">Anda terdaftar Sebagai</h3>
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
                                <td><?php echo $telp_ortu ?></td>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt1">Upload Bukti Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('uploadBuktiTf')?>" method="post" enctype="multipart/form-data" >
                            <div class="mb-3"> 
                                <div class="form-group">
                                    <label class="form-label" for="bukti" >Bukti Pembayaran</label>
                                    <input type="file" name="bukti" accept=".jpg, .jpeg, .png" class="form-control" id="bukti">
                                    <input type="hidden" name="par1" value="<?php echo $noreg?>">
                                    <input type="hidden" name="par2" value="<?php echo $tgl_lahir?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>