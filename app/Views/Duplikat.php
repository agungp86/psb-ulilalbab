<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-warning">
           Duplikasi data
        </div>
        <div class="card-body">
            <p>
                Anda telah terdaftar sebelumnya dengan nomor registrasi :
            <h2><span class="badge text-bg-success"><?= $noreg ?></span> <button class="btn btn-secondary" onclick="copyToClipboard()">Salin <i class="fa-regular fa-clone"></i></button></h2><br>
            <i class="fa-solid fa-triangle-exclamation text-warning"></i> Silahkan simpan atau catat nomor tersebut untuk proses pendaftaran selanjutnya.
            </p>
        </div>
    </div>
