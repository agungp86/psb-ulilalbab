<div class="container mt-3">
    <div class="card border-success">
        <div class="card-header border-success d-flex justify-content-between align-items-center ">
            <span>Data Berhasil Disimpan</span>
            <a href="<?= base_url('home') ?>" class="btn btn-outline-primary ml-auto"><i class="fa-solid fa-house-chimney"></i></a>
        </div>
        <div class="card-body border-success">
            <p>
                Terima kasih.
                Anda telah terdaftar dengan nomor registrasi :
            <h2><span class="badge text-bg-success"><?= $noreg ?></span> <button class="btn btn-secondary" onclick="copyToClipboard()">Salin <i class="fa-regular fa-clone"></i></button></h2><br>
            <i class="fa-solid fa-triangle-exclamation text-warning"></i> Silahkan simpan atau catat nomor tersebut untuk proses pendaftaran selanjutnya.
            </p>
        </div>
        <div class="card-footer border-success d-flex justify-content-end">
            
            <a href="#" class="btn btn-outline-success" onclick="submitForm()"><i class="fa-regular fa-hand-point-right"></i> Lanjut ke pembayaran</a>
            <form id="hiddenForm" action="<?= base_url('cekRegistrasi') ?>" method="get" style="display: none;">
                <input type="hidden" name="noreg" value="<?= $noreg ?>">
            </form>
        </div>
    </div>


    <script>
        function submitForm() {
            document.getElementById('hiddenForm').submit();
        }

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