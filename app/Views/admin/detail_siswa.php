<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Detail data pendaftaran
        </div>
        <div class="card-body">
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Nama</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['nama'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Jenis kelamin</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['jk'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Tempat tanggal lahir</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">NISN</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['nisn'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Nama Orangtua</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['ortu'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Alamat</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['detail_alamat'] ?><br>
                    <?= $siswa['kelurahan1']?>, <?= $siswa['kec1']?>, <?= $siswa['kabko1']?>, <?= $siswa['prov1']?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Telepon</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['telp_ortu'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Jalur Pendaftaran</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['jalur'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Sekolah Asal</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['nama_sekolah'] ?></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <p class="fw-medium">Alamat Sekolah</p>
                </div>
                <div class="col-md-8">
                    <p class="text-start">: <?= $siswa['kelurahan2']?>, <?= $siswa['kec2']?>, <?= $siswa['kabko2']?>, <?= $siswa['prov2']?></p>
                </div>
            </div>
        </div>
    </div>
    
</div>