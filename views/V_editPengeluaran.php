<?php require '../func/Session.php'; ?>
<?php require '../template/header.php'; ?>
<?php
require '../func/Pengeluaran.php';
$dana = new Keuangan();
$data = new Pengeluaran();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <?php foreach ($data->cariDataById() as $data) : ?>
                <form action="ConPengeluaran" method="post" class="form-control">
                    <input type="text" name="id" value="<?= $data['id']; ?>" required hidden>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="tglTrs" class="form-label">Tgl. Trs</label>
                                <input type="date" class="form-control" name="tglTrs" id="tglTrs" aria-describedby="tglTrsHelp" required value="<?= $data['tglTrs']; ?>">
                                <div id="tglTrsHelp" class="form-text">Masukan Tgl. Trs</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="dana" class="form-label">Sumber Dana</label>
                                <select class="form-select" aria-label="Default select example" name="dana">
                                    <option value="<?= $data['dana']; ?>"><?= $data['dana']; ?></option>
                                    <?php foreach ($dana->dana() as $d) : ?>
                                        <option value="<?= $d['Dana']; ?>"><?= $d['Dana']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="danaHelp" class="form-text">Pilih Sumber Dana</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="number" class="form-control" name="nominal" id="nominal" aria-describedby="nominalHelp" value="<?= $data['nominal']; ?>">
                                <div id="nominalHelp" class="form-text">Masukan Nominal</div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" aria-describedby="deskripsiHelp" value="<?= $data['deskripsi']; ?>">
                                <div id="deskripsiHelp" class="form-text">Masukan deskripsi</div>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit" name="btn_editPengeluaran">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require '../template/foother.php'; ?>