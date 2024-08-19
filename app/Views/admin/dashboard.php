<div class="container mt-3 justify-content-center">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url('dashboard')?>">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('form')?>">Form</a>
                </li>
            </ul>
            <form action="<?= base_url('logout')?>" method="get">
                <button type="submit" class="btn btn-outline-secondary">
                    Log Out
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button class="btn btn-outlinesecondary">
            </form>
        </div>
        <div class=" card-body p-3">
            <table class="table table-striped table-sm ">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>Waktu Pengisian Formulir</td>
                        <td>Asal Sekolah</td>
                        <td>Jalur</td>
                        <td>Detail</td>
                    </tr>
                </thead>
                <? $record = (array) $record; ?>
                <tbody>
                    <?php foreach ($record as $k) { ?>
                        <tr>
                            <td><?= $k['nama'] ?></td>
                            <td><?= (new \DateTime($k['created_at']))->format('d-m-y H:i')?></td>
                            <td><?= $k['nama_sekolah'] ?></td>
                            <td><?= $k['jalur'] ?></td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.open('<?= base_url('detail_siswa/' . $k['id']) ?>', '_blank')">
                                    <i class="fa-solid fa-maximize"></i>
                                </button>

                                <?php
                                switch ($k['stage']) {
                                    case 0:
                                        echo '<span class="badge text-bg-secondary">belum bayar</span>';
                                        break;
                                    case 1:
                                        echo '<span class="badge text-bg-success">sudah bayar</span>';
                                        break;
                                    case 2:
                                        echo '<span class="badge text-bg-primary">terkonfirmasi</span>';
                                        break;
                                    default:
                                        echo '<span class="badge text-bg-danger">status tidak dikenal</span>';
                                        break;
                                }
                                ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>
    </div>
</div>