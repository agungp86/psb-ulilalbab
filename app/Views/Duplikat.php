<div class="container mt-3">
    <div class="card border-warning">
        <div class="card-header border-warning d-flex justify-content-between align-items-center ">
        <i class="fa-solid fa-triangle-exclamation text-warning fa-2x"></i> <span>Duplikasi Data</span>
    <a href="<?= base_url() ?>" class="btn btn-outline-secondary ml-auto"><i class="fa-solid fa-house-chimney"></i></a>

        </div>
        <div class="card-body text-secondary">
            <p>
                Anda telah terdaftar sebelumnya dengan nomor registrasi :
            <h2><span class="badge text-bg-secondary"><?= $noreg ?></span> <button class="btn btn-secondary" onclick="copyToClipboard()">Salin <i class="fa-regular fa-clone"></i></button></h2><br>
            <i class="fa-solid fa-triangle-exclamation text-warning"></i> Silahkan simpan atau catat nomor tersebut untuk proses pendaftaran selanjutnya.
            </p>
        </div>
        <div class="card-footer d-flex justify-content-end border-warning">
            <a href="#" class="btn btn-outline-secondary" onclick="submitForm()">Cek Status Pendaftaran</a>
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