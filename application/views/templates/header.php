<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aisin Indonesia - <?= $title; ?></title>
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="https://kit.fontawesome.com/a076d05399.css" rel="stylesheet">

    <style>
        /* Pastikan footer selalu berada di bawah halaman */
        html,
        body {
            height: 100%;
            /* Tinggi seluruh halaman 100% */
            margin: 0;
            /* Menghilangkan margin default */
            padding: 0;
            /* Menghilangkan padding default */
            overflow-x: hidden;
            /* Menghindari scroll horizontal */
            display: flex;
            flex-direction: column;
        }

        /* Kontainer utama */
        .container {
            flex: 1;
            /* Membuat container mengisi ruang yang tersisa */
        }

        /* Navbar Styling */
        .navbar-custom {
            background-color: #0056b3;
            /* Warna biru Aisin */
            color: #fff;
            position: fixed;
            /* Membuat navbar tetap di atas */
            top: 0;
            /* Menempatkan navbar di atas */
            width: 100%;
            /* Mengatur lebar navbar agar 100% */
            z-index: 1000;
            /* Pastikan navbar berada di atas konten */
            padding: 10px 0;
            /* Menambahkan padding untuk navbar */
        }

        .navbar-custom .nav-link {
            color: #fff;
        }

        .navbar-custom .nav-link:hover {
            color: #ffdd57;
            /* Warna hover */
        }

        /* Footer Styling */
        footer {
            background-color: #343a40;
            /* Dark background untuk footer */
            color: white;
            padding: 20px 0;
            margin-top: auto;
            /* Memastikan footer selalu berada di bawah */
        }

        footer .bg-primary {
            background-color: #007bff;
            /* Warna biru untuk bagian bawah footer */
            padding: 10px 0;
        }

        footer .footer a {
            text-decoration: none;
            color: white;
        }

        footer .footer a:hover {
            color: #ccc;
            /* Hover efek untuk link */
        }

        footer h5 {
            font-weight: bold;
        }

        footer iframe {
            border-radius: 8px;
        }

        footer .col-md-4 {
            padding: 0 20px;
        }

        footer .text-center {
            padding: 10px;
        }

        /* Responsivitas pada ukuran layar lebih kecil */
        @media (max-width: 1024px) {
            footer .col-md-4 {
                margin-bottom: 20px;
            }
        }

        /* Menjaga konten utama tidak mempengaruhi layout */
        .content {
            margin-bottom: 50px;
            margin-top: 80px;
            /* Memberikan ruang untuk footer */
        }

        /* Efek Hover pada Gambar */
        .card-img-top {
            transition: transform 0.3s ease;
        }

        .card-img-top:hover {
            transform: scale(1.05);
        }

        /* Efek Hover pada Card */
        .card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        /* Memperindah tombol */
        .btn-primary {
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Warna biru Aisin saat hover */
        }

        /* Padding dan margin yang lebih baik */
        .card-body {
            padding: 20px;
        }

        .card-title {
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #555;
            font-size: 0.9em;
        }


        /* Styling untuk body konten */
        main {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <!-- Logo Aisin -->
            <a class="navbar-brand text-white" href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/images/aisin.png'); ?>" alt="Aisin Indonesia" style="max-height: 50px;">
                Aisin Indonesia
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('products'); ?>">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('contact'); ?>">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt content">