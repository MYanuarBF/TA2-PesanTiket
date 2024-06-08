<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pemesanan Tiket Wisata</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Harga">Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                </ul>
                <a class="btn btn-primary nav-link p-1 mx-2" href="{{ route('filament.admin.resources.transactions.index') }}" style="color: white;">Beli Tiket</a>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h2 class="text-white font-weight-bold">WISATA EDUKASI KETAHANAN PANGAN DESA KARANGNANGKA</h2>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Pesan tiket wisata edukasi hanya dengan Rp 50.000 per orang dan nikmati pengalaman belajar yang menyenangkan dan bermanfaat!</p>
                    <a class="btn btn-primary btn-xl" href="{{ route('filament.admin.resources.transactions.index') }}">Pesan Tiket Sekarang!</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Produk -->
    <section class="page-section py-5" id="kegiatan">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Ragam Kegiatan</h2>
            <hr class="divider">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="assets/img/kegiatan/kegiatan1.png" class="card-img-top" alt="...">
                        <div class="card-body mb-5">
                            <h5 class="card-title">Wahana Padi</h5>
                            <p class="card-text">Wahana Padi adalah salah satu kegiatan di tempat wisata edukasi kami. Anda akan belajar tentang proses pertanian padi, mulai dari penanaman hingga panen. Nikmati pengalaman belajar yang menyenangkan di Wahana Padi!</p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/img/kegiatan/kegiatan2.png" class="card-img-top" alt="...">
                        <div class="card-body mb-5">
                            <h5 class="card-title">Membajak Sawah</h5>
                            <p class="card-text">
                                Membajak Sawah adalah salah satu kegiatan di tempat wisata edukasi kami. Anda akan belajar tentang proses membajak sawah, mulai dari persiapan hingga teknik-teknik yang digunakan. Nikmati pengalaman belajar yang menyenangkan di Membajak Sawah!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/img/kegiatan/kegiatan3.png" class="card-img-top" alt="...">
                        <div class="card-body mb-5">
                            <h5 class="card-title">Mengenal Ekosistem Sungai</h5>
                            <p class="card-text">
                                Mengenal Ekosistem Sungai adalah salah satu kegiatan di tempat wisata edukasi kami. Anda akan mempelajari keanekaragaman hayati dan ekosistem sungai. Nikmati pengalaman belajar yang menyenangkan di Mengenal Ekosistem Sungai!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- daftar harga -->
    <section class="page-section" id="Harga">
        <h2 class="text-center mt-0">Harga Tiket</h2>
        <hr class="divider" />
        <div class="container px-4 px-lg-5">
            <div class="card mb-4 shadow-sm w-auto text-center">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Tiket Wisata Edukasi</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">RP. 50.000 <small class="text-muted">/ Orang</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                <li><b>Fasilitas yang didapat :</b></li>
                <li>Makan Siang</li>
                <li>ban untuk bermain di sungai</li>
                <li>4 kamar mandi</li>
                <li>Pendopo</li>
                </ul>
                <a href="{{ route('filament.admin.resources.transactions.create') }}">
                <button type="button" class="btn btn-lg btn-block btn-outline-primary">Pesan Tiket</button>
                </a>
            </div>
            </div>
    </section>
    <!-- Tentang-->
    <section class="page-section" id="tentang">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Tentang</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-geo-alt fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Alamat</h3>
                        <p class="text-muted mb-0">Desa karangnangka</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-telephone fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Telepon</h3>
                        <p class="text-muted mb-0">+62 281 1234567</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-envelope fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Email</h3>
                        <p class="text-muted mb-0">wisataedukasi@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2024 - Wisata Edukasi</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>