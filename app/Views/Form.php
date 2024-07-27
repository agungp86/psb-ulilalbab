<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Siswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container mt-2">
        <h1>Form Pendaftaran Siswa Baru</h1>
        <form id="registrationForm" method="post" action="<?php echo base_url('postReg') ?>">
            <div class="card mb-3">
                <div class="card-header">
                    <h3>Data Diri</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <label class="form-label" for="nama">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label" for="gender">Jenis Kelamin:</label>
                            <select class="form-select" name="jk" aria-label="Default select example">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="jalur">Jalur Pendaftaran</label>
                            <select class="form-select" name="jalur" aria-label="Default select example">
                                <option value="Reguler">Reguler</option>
                                <option value="Prestasi">Prestasi</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="tempat lahir" required>
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="nomor_identitas">NISN</label>
                            <input type="text" class="form-control" id="nomor_identitas" name="nomor_identitas" placeholder="NISN" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="nama_orang_tua">Nama Orang Tua:</label>
                            <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" placeholder="nama orang tua" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="telepon_orang_tua">Nomor Telepon Orang Tua:</label>
                            <input type="tel" id="telepon_orang_tua" class="form-control" name="telepon_orang_tua" placeholder="+62" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label" for="alamat">Alamat Rumah :</label>
                            <input type="text" class="form-control" name="alamat" id="" placeholder="RT RW Jalan Blok No">
                        </div>

                        <div class="col-lg-6">
                            <label class="form-labe"> Provinsi </label>
                            <select class="form-select" name="provinsi_siswa" id="select2-provinsi"></select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-labe"> Kabupaten </label>
                            <select class="form-select" name="kabupaten_siswa" id="select2-kabupaten"></select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-labe"> Kecamatan </label>
                            <select class="form-select" name="kecamatan_siswa" id="select2-kecamatan"></select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-labe"> Kelurahan / Desa</label>
                            <select class="form-select" name="kelurahan_siswa" id="select2-kelurahan"></select>
                        </div>


                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Asal Sekolah</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label" for="nama_sekolah">Nama Asal Sekolah:</label>
                            <input type="text" class="form-control" placeholder="SD/MI" id="nama_sekolah" name="nama_sekolah" required>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label" for="provinsi_sekolah">Provinsi Asal Sekolah:</label>
                            <select class="form-select" id="provinsi_sekolah" name="provinsi_sekolah" required></select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label" for="kabupaten_sekolah">Kabupaten Asal Sekolah:</label>
                            <select class="form-select" id="kabupaten_sekolah" name="kabupaten_sekolah" required></select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label" for="kecamatan_sekolah">Kecamatan Asal Sekolah:</label>
                            <select class="form-select" id="kecamatan_sekolah" name="kecamatan_sekolah" required></select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label" for="kelurahan_sekolah">Kelurahan / Desa Asal Sekolah:</label>
                            <select class="form-select" id="kelurahan_sekolah" name="kelurahan_sekolah" required></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3 mb-5">
                <div class="card-body">
                    <div class="form-check mb-3">

                        <input class="form-check-input" type="checkbox" id="termsCheckbox">
                        <label class="form-check-label" for="termsCheckbox">
                            Ceklist (v) jika data sudah dipastikan benar
                        </label>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-outline-primary btn-block" type="submit" id="submitButton" disabled>Daftar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.getElementById('termsCheckbox').addEventListener('change', function() {
        document.getElementById('submitButton').disabled = !this.checked;
    });

    var urlProvinsi = "<?php echo base_url('Prov') ?>";
    var urlKabupaten = "https://ibnux.github.io/data-indonesia/kabupaten/";
    var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";
    var urlKelurahan = "https://ibnux.github.io/data-indonesia/kelurahan/";

    function clearOptions(id) {
        console.log("on clearOptions :" + id);

        //$('#' + id).val(null);
        $('#' + id).empty().trigger('change');
    }

    console.log('Load Provinsi...');
    $.getJSON(urlProvinsi, function(res) {

        res = $.map(res, function(obj) {
            obj.text = obj.nama
            return obj;
        });

        data = [{
            id: "",
            nama: "- Pilih Provinsi -",
            text: "- Pilih Provinsi -"
        }].concat(res);

        //implemen data ke select provinsi
        $("#select2-provinsi").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    });

    var selectProv = $('#select2-provinsi');
    $(selectProv).change(function() {
        var value = $(selectProv).val();
        clearOptions('select2-kabupaten');

        if (value) {
            console.log("on change selectProv");

            var text = $('#select2-provinsi :selected').text();
            console.log("value = " + value + " / " + "text = " + text);

            console.log('Load Kabupaten di ' + text + '...')
            $.getJSON(urlKabupaten + value + ".json", function(res) {

                res = $.map(res, function(obj) {
                    obj.text = obj.nama
                    return obj;
                });

                data = [{
                    id: "",
                    nama: "- Pilih Kabupaten -",
                    text: "- Pilih Kabupaten -"
                }].concat(res);

                //implemen data ke select provinsi
                $("#select2-kabupaten").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    data: data
                })
            })
        }
    });

    var selectKab = $('#select2-kabupaten');
    $(selectKab).change(function() {
        var value = $(selectKab).val();
        clearOptions('select2-kecamatan');

        if (value) {
            console.log("on change selectKab");

            var text = $('#select2-kabupaten :selected').text();
            console.log("value = " + value + " / " + "text = " + text);

            console.log('Load Kecamatan di ' + text + '...')
            $.getJSON(urlKecamatan + value + ".json", function(res) {

                res = $.map(res, function(obj) {
                    obj.text = obj.nama
                    return obj;
                });

                data = [{
                    id: "",
                    nama: "- Pilih Kecamatan -",
                    text: "- Pilih Kecamatan -"
                }].concat(res);

                //implemen data ke select provinsi
                $("#select2-kecamatan").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    data: data
                })
            })
        }
    });

    var selectKec = $('#select2-kecamatan');
    $(selectKec).change(function() {
        var value = $(selectKec).val();
        clearOptions('select2-kelurahan');

        if (value) {
            console.log("on change selectKec");

            var text = $('#select2-kecamatan :selected').text();
            console.log("value = " + value + " / " + "text = " + text);

            console.log('Load Kelurahan di ' + text + '...')
            $.getJSON(urlKelurahan + value + ".json", function(res) {

                res = $.map(res, function(obj) {
                    obj.text = obj.nama
                    return obj;
                });

                data = [{
                    id: "",
                    nama: "- Pilih Kelurahan -",
                    text: "- Pilih Kelurahan -"
                }].concat(res);

                //implemen data ke select provinsi
                $("#select2-kelurahan").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    data: data
                })
            })
        }
    });

    var selectKel = $('#select2-kelurahan');
    $(selectKel).change(function() {
        var value = $(selectKel).val();

        if (value) {
            console.log("on change selectKel");

            var text = $('#select2-kelurahan :selected').text();
            console.log("value = " + value + " / " + "text = " + text);
        }
    });

    // Scrip alamat seklah --------------------------------------
    console.log('Load Provinsi...');
    $.getJSON(urlProvinsi, function(res) {

        res = $.map(res, function(obj) {
            obj.text = obj.nama
            return obj;
        });

        data = [{
            id: "",
            nama: "- Pilih Provinsi -",
            text: "- Pilih Provinsi -"
        }].concat(res);

        //implemen data ke select provinsi
        $("#provinsi_sekolah").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    });

    var selectProv2 = $('#provinsi_sekolah');
    $(selectProv2).change(function() {
        var value = $(selectProv2).val();
        clearOptions('kabupaten_sekolah');

        if (value) {
            console.log("on change selectProv2");

            var text = $('#provinsi_sekolah :selected').text();
            console.log("value = " + value + " / " + "text = " + text);

            console.log('Load Kabupaten di ' + text + '...')
            $.getJSON(urlKabupaten + value + ".json", function(res) {

                res = $.map(res, function(obj) {
                    obj.text = obj.nama
                    return obj;
                });

                data = [{
                    id: "",
                    nama: "- Pilih Kabupaten -",
                    text: "- Pilih Kabupaten -"
                }].concat(res);

                //implemen data ke select provinsi
                $("#kabupaten_sekolah").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    data: data
                })
            })
        }
    });

    var selectKab2 = $('#kabupaten_sekolah');
    $(selectKab2).change(function() {
        var value = $(selectKab2).val();
        clearOptions('kecamatan_sekolah');

        if (value) {
            console.log("on change selectKab2");

            var text = $('#kabupaten_sekolah :selected').text();
            console.log("value = " + value + " / " + "text = " + text);

            console.log('Load Kecamatan di ' + text + '...')
            $.getJSON(urlKecamatan + value + ".json", function(res) {

                res = $.map(res, function(obj) {
                    obj.text = obj.nama
                    return obj;
                });

                data = [{
                    id: "",
                    nama: "- Pilih Kecamatan -",
                    text: "- Pilih Kecamatan -"
                }].concat(res);

                //implemen data ke select provinsi
                $("#kecamatan_sekolah").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    data: data
                })
            })
        }
    });

    var selectKec2 = $('#kecamatan_sekolah');
    $(selectKec2).change(function() {
        var value = $(selectKec2).val();
        clearOptions('kelurahan_sekolah');

        if (value) {
            console.log("on change selectKec2");

            var text = $('#kecamatan_sekolah :selected').text();
            console.log("value = " + value + " / " + "text = " + text);

            console.log('Load Kelurahan di ' + text + '...')
            $.getJSON(urlKelurahan + value + ".json", function(res) {

                res = $.map(res, function(obj) {
                    obj.text = obj.nama
                    return obj;
                });

                data = [{
                    id: "",
                    nama: "- Pilih Kelurahan -",
                    text: "- Pilih Kelurahan -"
                }].concat(res);

                //implemen data ke select provinsi
                $("#kelurahan_sekolah").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    data: data
                })
            })
        }
    });

    var selectKel2 = $('#kelurahan_sekolah');
    $(selectKel2).change(function() {
        var value = $(selectKel2).val();

        if (value) {
            console.log("on change selectKel2");

            var text = $('#kelurahan_sekolah :selected').text();
            console.log("value = " + value + " / " + "text = " + text);
        }
    });
</script>

</html>