<?php require '../func/Session.php'; ?>
<?php
require '../func/Pengeluaran.php';
$data = new Pengeluaran();
?>
<?php require '../template/header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-2">
            <a href="insertPengeluaran"><button class="btn btn-primary btn-sm"><i class="bi bi-plus"></i><i class="bi bi-coin"></i></button></a>
        </div>
        <div class="col-5 text-center">
            <b>Total Pemasukan : <span class="badge bg-success"><?= $data->totalPengeluaran(); ?></span></b>
        </div>
    </div>
</div>
<div class="container border rounded mt-2">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tgl. Trs</th>
                        <th scope="col">sumber Dana</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data->tampilDataPengeluaran() as $row) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $row['tglTrs']; ?></td>
                            <td><?= $row['dana']; ?></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td>
                                <?php
                                $rp = $row['nominal'];
                                $hasil = "Rp. " . number_format($rp, 0, ',', '.');
                                echo $hasil;
                                ?>
                            </td>
                            <td class="">
                                <div class="d-flex">
                                    <form action="editPengeluaran" method="post">
                                        <input type="text" value="<?= $row['id']; ?>" name="id" hidden>
                                        <button class="btn btn-warning btn-sm ms-2" type="submit" name="btn_editPemasukan"><i class="bi bi-tools"></i></button>
                                    </form>
                                    <form action="ConPengeluaran" method="post">
                                        <input type="text" value="<?= $row['id']; ?>" name="id" hidden>
                                        <button class="btn btn-danger btn-sm ms-2" type="submit" name="btn_hapusPengeluaran"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require '../template/foother.php'; ?>