
    <div class="container mt-2 ">
        <form id="registrationForm" method="post" action="<?php echo base_url('postEdit') ?>">
            <input type="hidden" name="id" value="<?=$value['id']?>">
            <div class="card border-secondary  mb-3">
                <div class="card-body">
                    <div class="row">
                    <?php //d($value)?>
                        <div class="col-lg-8 mb-2">
                            <label class="form-label" for="nama">Nama Lengkap:</label>
                            <input type="text" class="form-control form-control-sm" value="<?=$value['nama']?>" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label" for="gender">Jenis Kelamin:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" <?= $value['jk'] == 'Laki-laki' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="laki-laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan" <?= $value['jk'] == 'Perempuan' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-2">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" value="<?=$value['tempat_lahir']?>" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                        </div>

                        <div class="col-lg-4 mb-2">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" value="<?=$value['tgl_lahir']?>" id="tanggal_lahir" class="form-control form-control-sm" name="tanggal_lahir">
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label class="form-label" for="nama_orang_tua">Nama Orang Tua:</label>
                            <input type="text" value="<?=$value['ortu']?>" class="form-control form-control-sm" id="nama_orang_tua" name="nama_orang_tua" placeholder="Nama Orang Tua">
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label class="form-label" for="telepon_orang_tua">Nomor Telepon Orang Tua:</label>
                            <input type="tel" value="<?=$value['telp_ortu']?>" id="telepon_orang_tua" class="form-control form-control-sm" name="telepon_orang_tua" placeholder="+62">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label class="form-label" for="alamat">Alamat Rumah :</label>
                            <input type="text" value="<?=$value['detail_alamat']?>" class="form-control form-control-sm" name="alamat" id="" placeholder="RT RW Jalan Blok No">
                        </div>

                        <div class="col-lg-6 mb-2">
                            <label class="form-labe"> Provinsi </label>
                            <small class="badge text-bg-secondary"><?= $value['prov1']?></small>
                            <select class="form-select form-select-sm" name="provinsi_siswa" id="select2-provinsi"></select>
                        </div>

                        <div class="col-lg-6 mb-2">
                            <label class="form-labe"> Kabupaten </label>
                            <small class="badge text-bg-secondary"><?= $value['kabko1']?></small>
                            <select class="form-select form-select-sm" name="kabupaten_siswa" id="select2-kabupaten"></select>
                        </div>

                        <div class="col-lg-6 mb-2">
                            <label class="form-labe"> Kecamatan </label>
                            <small class="badge text-bg-secondary"><?= $value['kec1']?></small>
                            <select class="form-select form-select-sm" name="kecamatan_siswa" id="select2-kecamatan"></select>
                        </div>

                        <div class="col-lg-6 mb-2">
                            <label class="form-labe"> Kelurahan / Desa</label>
                            <small class="badge text-bg-secondary"><?= $value['kelurahan1']?></small>
                            <select class="form-select form-select-sm" name="kelurahan_siswa" id="select2-kelurahan"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-secondary "> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label" for="nama_sekolah">Nama Asal Sekolah:</label>
                            <input type="text" class="form-control form-control-sm" placeholder="SD/MI" id="nama_sekolah" value="<?= $value['nama_sekolah']?>" name="nama_sekolah">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="provinsi_sekolah">Provinsi Asal Sekolah:</label>
                            <small class="badge text-bg-secondary"><?= $value['prov2']?></small>
                            <select class="form-select form-select-sm" id="provinsi_sekolah" name="provinsi_sekolah"></select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="kabupaten_sekolah">Kabupaten Asal Sekolah:</label>
                            <small class="badge text-bg-secondary"><?= $value['kabko2']?></small>
                            <select class="form-select form-select-sm" id="kabupaten_sekolah" name="kabupaten_sekolah"></select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="kecamatan_sekolah">Kecamatan Asal Sekolah:</label>
                            <small class="badge text-bg-secondary"><?= $value['kec2']?></small>
                            <select class="form-select form-select-sm" id="kecamatan_sekolah" name="kecamatan_sekolah"></select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="kelurahan_sekolah">Kelurahan / Desa Asal Sekolah:</label>
                            <small class="badge text-bg-secondary"><?= $value['kelurahan2']?></small>
                            <select class="form-select form-select-sm" id="kelurahan_sekolah" name="kelurahan_sekolah"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-secondary  mt-3">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <label class="form-label" for="jalur">Jalur Pendaftaran</label>
                            <small class="badge text-bg-secondary"><?= $value['jalur']?></small>
                            <select class="form-select form-select-sm" name="jalur" aria-label="Default select example">
                                <option value="">Pilih Jalur ...</option>
                                <?php $jalur = (array) $jalur;
                                foreach ($jalur as $key) { ?>
                                    <option value="<?= $key['nama'] ?>"><?= $key['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label class="form-label" for="jalur">Calon Santri Baru untuk Tahun Ajaran</label>
                            <small class="badge text-bg-secondary"><?= $value['tahunajar']?></small>
                            <select class="form-select form-select-sm" name="thn_ajar" aria-label="Default select example">
                                <option value="">Tahun Ajaran ...</option>
                                <?php $tahunajar = (array) $tahunajar;
                                foreach ($tahunajar as $key) { ?>
                                    <option value="<?= $key['nama'] ?>"><?= $key['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-secondary  mt-3 mb-5">
                <div class="card-body">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary btn-block" type="submit" id="submitButton" >Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

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

