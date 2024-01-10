<?php

require 'Admin.php';

//insert data admin control
if (isset($_POST['btn_insertAdmin'])) {
    $insert = new Admin();
    $insert->insertDataAdmin();
}

//hapus data admin control
if (isset($_POST['btn_hapusAdmin'])) {
    $delete = new Admin();
    $delete->deleteDataAdmin();
}

//update data admin control
if (isset($_POST['btn_editAdmin'])) {
    $update = new Admin();
    $update->updateDataAdmin();
}
