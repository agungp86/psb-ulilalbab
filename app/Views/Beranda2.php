<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PSB - SMPIT Ulil Albab Karanganyar</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">PSB - SMPIT Ulil Albab Karanganyar</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('registrasiBaru') ?>">Daftar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Cek Status</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Petunjuk Pendaftaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://smpit.ulilalbabkra.sch.id">Profil Pesantren</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0">Penerimaan Siswa Baru</h1>
                    <h2 class="mx-auto mt-2 mb-5">SMPIT Ulil Albab Karanganyar</h2>
                    <a class="btn btn-primary" href="<?php echo base_url('registrasiBaru') ?>">Daftar Baru</a>
                    <a class="btn btn-success" href="#projects">Cek Pendaftaran</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Projects-->
    <section id="projects" class="text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Icon -->
                    <i class="fa-solid fa-child-reaching fa-3x mb-3 text-white" ></i>
                    <!-- Judul -->
                    <h2 class="mb-4">Cek Status Pendaftaran</h2>
                    <!-- Form Pendaftaran -->
                    <form action="<?= base_url('cekRegistrasi') ?>" method="get" class="w-75 mx-auto">
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="noreg"
                                name="noreg"
                                placeholder="Nomor Pendaftaran"
                                aria-label="Nomor Pendaftaran"
                                required>
                            <button class="btn btn-primary" type="submit">Cek</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; ulilalbabkra.sch.id 2024</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>