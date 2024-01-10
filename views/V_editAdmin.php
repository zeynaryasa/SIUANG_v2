<?php
require '../func/Admin.php';
$dataAdmin = new Admin();
?>
<?php require '../func/Session.php'; ?>
<?php require '../template/header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <?php foreach ($dataAdmin->cariDataById() as $row) : ?>
                <form action="ConAdmin" method="post" class="form-control">
                    <div class="row">
                        <input type="text" name="id" value="<?= $row['id']; ?>" required hidden>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" name="nik" id="nik" aria-describedby="nikHelp" required value="<?= $row['nik']; ?>">
                                <div id="nikHelp" class="form-text">Masukan NIK sesuai KTP</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" value="<?= $row['nama']; ?>">
                                <div id="namaHelp" class="form-text">Masukan nama sesuai KTP</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" value="<?= $row['username']; ?>">
                                <div id="usernameHelp" class="form-text">Masukan username</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password" aria-describedby="passwordHelp" value="<?= $row['password']; ?>">
                                <div id="passwordHelp" class="form-text">Masukan password</div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit" name="btn_editAdmin">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require '../template/foother.php'; ?>