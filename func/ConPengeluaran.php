<?php
require 'Pengeluaran.php';

//insert data Pengeluaran control
if (isset($_POST['btn_insertPengeluaran'])) {
    $insert = new Pengeluaran();
    $insert->insertDataPengeluaran();
}

//delete data Pengeluaran control
if (isset($_POST['btn_hapusPengeluaran'])) {
    $delete = new Pengeluaran();
    $delete->deleteDataPengeluaran();
}

//update data Pengeluaran control
if (isset($_POST['btn_editPengeluaran'])) {
    $update = new Pengeluaran();
    $update->updateDataPengeluaran();
}
