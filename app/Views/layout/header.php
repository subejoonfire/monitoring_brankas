<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Monitoring Brankas' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('dashboard') ?>">Brankas Monitor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link<?= service('uri')->getSegment(1) == 'dashboard' ? ' active' : '' ?>"
                            href="<?= base_url('dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= service('uri')->getSegment(1) == 'anggota' ? ' active' : '' ?>"
                            href="<?= base_url('anggota') ?>">Data Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= service('uri')->getSegment(1) == 'riwayat/berhasil' ? ' active' : '' ?>"
                            href="<?= base_url('riwayat/berhasil') ?>">Riwayat Berhasil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= service('uri')->getSegment(1) == 'riwayat/gagal' ? ' active' : '' ?>"
                            href="<?= base_url('riwayat/gagal') ?>">Riwayat Gagal</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container mt-4">