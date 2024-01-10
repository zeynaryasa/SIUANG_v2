<?php require '../func/Session.php'; ?>
<?php require '../template/header.php'; ?>
<?php
require '../func/Keuangan.php';
$dana = new Keuangan();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <form action="ConPengeluaran" method="post" class="form-control">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="tglTrs" class="form-label">Tgl. Trs</label>
                            <input type="date" class="form-control" name="tglTrs" id="tglTrs" aria-describedby="tglTrsHelp" required>
                            <div id="tglTrsHelp" class="form-text">Masukan Tgl. Trs</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="dana" class="form-label">Sumber Dana</label>
                            <select class="form-select" aria-label="Default select example" name="dana">
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
                            <input type="number" class="form-control" name="nominal" id="nominal" aria-describedby="nominalHelp">
                            <div id="nominalHelp" class="form-text">Masukan Nominal</div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" aria-describedby="deskripsiHelp">
                            <div id="deskripsiHelp" class="form-text">Masukan deskripsi</div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="btn_insertPengeluaran">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require '../template/foother.php'; ?>