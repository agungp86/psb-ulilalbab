<div class="container mt-3 justify-content-center">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('dashboard') ?>">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url('form') ?>">Form</a>
                </li>
            </ul>
            <form action="<?= base_url('logout') ?>" method="get">
                <button type="submit" class="btn btn-outline-secondary">
                    Log Out
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button class="btn btn-outlinesecondary">
            </form>
        </div>
        <div class=" card-body p-3">
            <div class="row">
                <div class="col-md-6">
                    <h5>Jalur Pendaftaran</h5>
                    <table class="table table-borderless">
                        <?php $jalur = (array) $jalur;
                        foreach ($jalur as $key) { ?>
                            <form action="<?php echo base_url('updatejalur')?>" method="post">
                                <tr>
                                    <td>
                                    <input type="hidden" name="id" value="<?php echo $key['id']?>">    
                                    <input class="form-control " type="text" name="nama" id="" value="<?php echo $key['nama'] ?>"></td>
                                    <!-- <td style="max-width: 2rem;">
                                        
                                        </td> -->
                                        <td>
                                            <button type="submit" class="btn"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <?php if ($key['enable'] == 0) { ?>
                                                <a href="<?php echo base_url('statusjalur/').$key['id']."/1"?>" class="btn btn-sm btn-secondary badge"><small>disable</small></a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url('statusjalur/').$key['id']."/0"?>" class="btn btn-sm btn-primary badge"><small>enable</small></a>
                                            <?php } ?>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Tahun Ajaran</h5>
                    <table class="table table-borderless">
                        <?php $tahun = (array) $tahun;
                        foreach ($tahun as $key) { ?>
                            <form action="<?php echo base_url('updatetahun')?>" method="post">
                                <tr>
                                    <td>
                                    <input type="hidden" name="id" value="<?php echo $key['id']?>">    
                                    <input class="form-control " type="text" name="nama" id="" value="<?php echo $key['nama'] ?>"></td>
                                    <!-- <td style="max-width: 2rem;">
                                        
                                        </td> -->
                                        <td>
                                            <button type="submit" class="btn"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <?php if ($key['enable'] == 0) { ?>
                                                <a href="<?php echo base_url('statustahun/').$key['id']."/1"?>" class="btn btn-sm btn-secondary badge"><small>disable</small></a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url('statustahun/').$key['id']."/0"?>" class="btn btn-sm btn-primary badge"><small>enable</small></a>
                                            <?php } ?>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>