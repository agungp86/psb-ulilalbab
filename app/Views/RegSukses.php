<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Data Berhasil Disimpan
        </div>
        <div class="card-body">
            <p>
                Terima kasih.
                Anda telah terdaftar dengan nomor registrasi :
            <h2><span class="badge text-bg-success"><?= $noreg ?></span> <button class="btn btn-secondary" onclick="copyToClipboard()">Salin <i class="fa-regular fa-clone"></i></button></h2><br>
            <i class="fa-solid fa-triangle-exclamation text-warning"></i> Silahkan simpan atau catat nomor tersebut untuk proses pendaftaran selanjutnya.
            </p>
        </div>
    </div>


<script>
    function copyToClipboard() {
        const textToCopy = "<?= $noreg ?>";
        const tempInput = document.createElement("input");
        document.body.appendChild(tempInput);
        tempInput.value = textToCopy;
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        alert("Nomor pendaftaran disalin ke papan klip : <?= $noreg ?>");
    }
</script>