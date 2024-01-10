<?php
require 'Pemasukan.php';

// insert data pemasukan control
if (isset($_POST['btn_insertPemasukan'])) {
    $insert = new Pemasukan();
    $insert->insertDataPemasukan();
}

//delete data pemasukan control
if (isset($_POST['btn_hapusPemasukan'])) {
    $delete = new Pemasukan();
    $delete->deleteDataPemasukan();
}

//update data pemasukan control
if (isset($_POST['btn_editPemasukan'])) {
    $update = new Pemasukan();
    $update->updateDataPemasukan();
}
