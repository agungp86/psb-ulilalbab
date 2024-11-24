<div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Card for Foto -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Upload Foto</h5>
                        <form action="<?php echo base_url('berkas/upload/foto')?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="mb-3">
                                <!-- <label for="foto" class="form-label">Foto</label> -->
                                <input type="file" accept=".jpeg, .jpg" class="form-control" id="foto" name="foto" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <small class="badge text-bg-light"><a href="#" target="_blank">Lihat</a> berkas sebelumnya</small>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Card for Fotocopy Akta -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Upload Fotocopy Akta</h5>
                        <form action="<?php echo base_url('berkas/upload/akta')?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="mb-3">
                                <!-- <label for="akta" class="form-label">Fotocopy Akta</label> -->
                                <input type="file" accept=".pdf" class="form-control" id="akta" name="akta" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <small class="badge text-bg-light"><a href="#" target="_blank">Lihat</a> berkas sebelumnya</small>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Card for Fotocopy KK -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Upload Fotocopy KK</h5>
                        <form action="<?php echo base_url('berkas/upload/kk')?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="mb-3">
                                <!-- <label for="kk" class="form-label">Fotocopy KK</label> -->
                                <input type="file" accept=".pdf" class="form-control" id="kk" name="kk" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <small class="badge text-bg-light"><a href="#" target="_blank">Lihat</a> berkas sebelumnya</small>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Card for Surat Keterangan -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Upload Surat Keterangan</h5>
                        <form action="<?php echo base_url('berkas/upload/surat')?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="mb-3">
                                <!-- <label for="surat" class="form-label">Surat Keterangan</label> -->
                                <input type="file" accept=".pdf" class="form-control" id="surat" name="surat" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <small class="badge text-bg-light"><a href="#" target="_blank">Lihat</a> berkas sebelumnya</small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
