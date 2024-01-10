<?php require '../func/Session.php'; ?>
<?php
require '../func/Admin.php';
require '../func/Keuangan.php';
$dataA = new Admin();
$total = new Keuangan();
?>
<?php require '../template/header.php'; ?>
<div class="container-fluid mt-3">
    <div class="row mx-4 mb-4 mt-7">
        <div class="col-sm-3 mt-3">
            <div class="card border border-success border-5 bg-success">
                <div class="card-body">
                    <h5 class="card-title text-light">Pemasukan [KAS]</h5>
                    <h4 class="card-text text-light"><i class="bi bi-envelope-paper-fill"></i>
                        <?= $total->hitungPemasukanKas(); ?>
                    </h4>
                    <a href="pemasukan" class="btn btn-success border border">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card border border-success  border-5 bg-success">
                <div class="card-body">
                    <h5 class="card-title text-light">Pemasukan [IURAN]</h5>
                    <h4 class="card-text text-light"> <i class=" bi bi-person-fill-gear"></i>
                        <?= $total->hitungPemasukanIuran(); ?>
                    </h4>
                    <a href="pemasukan" class="btn btn-success border text-light">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card border border-danger border-5 bg-danger">
                <div class="card-body">
                    <h5 class="card-title text-light">Pengeluaran [KAS]</h5>
                    <h4 class="card-text text-light"><i class=" bi bi-wallet-fill"></i>
                        <?= $total->hitungPengeluaranKas(); ?>
                    </h4>
                    <a href="pengeluaran" class="btn btn-danger border">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-3  mt-3  ">
            <div class="card border border-danger border-5 bg-danger">
                <div class="card-body">
                    <h5 class="card-title text-light">Pengeluaran [IURAN]</h5>
                    <h4 class="card-text text-light"><i class="bi bi-building-fill-add"></i>
                        <?= $total->hitungPengeluaranIuran(); ?>
                    </h4>
                    <a href="sipp" class="btn btn-danger border text-light">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card border border-warning border-5 bg-warning">
                <div class="card-body">
                    <h5 class="card-title text-light">Saldo [KAS]</h5>
                    <h4 class="card-text text-light"><i class="bi bi-building-fill-up"></i>
                        <?= $total->saldoKas(); ?>
                    </h4>
                    <a href="" class="btn btn-warning border text-light">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card border border-warning border-5 bg-warning">
                <div class="card-body">
                    <h5 class="card-title text-light">Saldo [IURAN]</h5>
                    <h4 class="card-text text-light"><i class="bi bi-building-fill-up"></i>
                        <?= $total->saldoIuran(); ?>
                    </h4>
                    <a href="" class="btn btn-warning border text-light">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card border border-primary border-5 bg-primary">
                <div class="card-body">
                    <h5 class="card-title text-light">Saldo [TOTAL]</h5>
                    <h4 class="card-text text-light"><i class="bi bi-building-fill-up"></i>
                        <?= $total->saldoTotal(); ?>
                    </h4>
                    <a href="" class="btn btn-primary border text-light">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card border border-primary border-5 bg-primary">
                <div class="card-body">
                    <h5 class="card-title text-light">Administrator</h5>
                    <h4 class="card-text text-light"><i class="bi bi-building-fill-up"></i>
                        <?= $dataA->hitungAdmin(); ?>
                    </h4>
                    <a href="admin" class="btn btn-primary border text-light">
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require '../template/foother.php'; ?>