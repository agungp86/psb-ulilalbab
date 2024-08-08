<div class="container mt-3 justify-content-center">
 <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        Dashboard Admin
        <button class="btn btn-outline-secondary">
        Log Out 
        <i class="fa-solid fa-right-from-bracket"></i>
        </button class="btn btn-outlinesecondary">
    </div>
    <div class="card p-3">
        <table class="table table-striped table-sm ">
    <thead>
        <tr>
            <td>Nama</td>
            <td>Orangtua</td>
            <td>Asal Sekolah</td>
            <td>Jalur</td>
            <td>Detail</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($record as $k) { ?>
            <tr>
                <td><?= $k['nama'] ?></td>
                <td><?= $k['ortu'] ?></td>
                <td><?= $k['nama_sekolah'] ?></td>
                <td><?= $k['jalur'] ?></td>
                <td><?= $k['id'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
        </table>
        
       

    </div>
 </div>
</div>