<?php
require '../func/Admin.php';
require '../func/Session.php';
$pesan = new Database();
?>
<?php require '../template/header.php'; ?>
<div class="container mt-2 bg-info">
    <div class="row">
        <div class="col-12">
            <?= $pesan->flash_message('pesan'); ?>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a href="insertAdmin"><button class="btn btn-primary btn-sm"><i class="bi bi-plus"></i><i class="bi bi-people"></i></button></a>
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
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dataAdmin = new Admin();
                    $no = 1;
                    foreach ($dataAdmin->tampilDataAdmin() as $row) :
                    ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $row['nik']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['password']; ?></td>
                            <td class="">
                                <div class="d-flex">
                                    <form action="editAdmin" method="post">
                                        <input type="text" value="<?= $row['id']; ?>" name="id" hidden>
                                        <button class="btn btn-warning btn-sm ms-2" type="submit" name="btn_editAdmin"><i class="bi bi-tools"></i></button>
                                    </form>
                                    <form action="ConAdmin" method="post">
                                        <input type="text" value="<?= $row['nik']; ?>" name="nik" hidden>
                                        <button class="btn btn-danger btn-sm ms-2" type="submit" name="btn_hapusAdmin"><i class="bi bi-trash"></i></button>
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