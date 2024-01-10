<?php
require 'Keuangan.php';

class Pengeluaran extends Keuangan
{
    public function tampilDataPengeluaran()
    {
        $sql = "SELECT * FROM tb_pengeluaran ORDER BY id DESC";
        $query = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function caridataById()
    {
        $sql = "SELECT * FROM tb_pengeluaran WHERE id = '" . $_POST['id'] . "'";
        $query = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertDataPengeluaran()
    {
        if (isset($_POST)) {
            $tglTrs = $_POST['tglTrs'];
            $dana = $_POST['dana'];
            $deskripsi = $_POST['deskripsi'];
            $nominal = $_POST['nominal'];
            if (!empty($tglTrs) && !empty($dana)  && !empty($deskripsi) && !empty($nominal)) {
                $sql = "INSERT INTO tb_pengeluaran VALUES(
                NULL,
                '$tglTrs',
                '$dana',
                '$deskripsi',
                '$nominal')";
                $query = mysqli_query($this->conn, $sql);
                if ($query) {
                    header("Location: pengeluaran");
                } else {
                    header("Location: insertPengeluaran");
                }
            }
        }
    }

    public function deleteDataPengeluaran()
    {
        if (isset($_POST)) {
            $id = $_POST['id'];
            if (!empty($id)) {
                $sql = "DELETE FROM tb_pengeluaran WHERE id = '$id'";
                $query = mysqli_query($this->conn, $sql);

                if ($query) {
                    header("Location: pengeluaran");
                } else {
                    header("Location: pengeluaran");
                }
            }
        }
    }

    public function updateDataPengeluaran()
    {
        if (isset($_POST)) {
            $id = $_POST['id'];
            $tglTrs = $_POST['tglTrs'];
            $dana = $_POST['dana'];
            $nominal = $_POST['nominal'];
            $deskripsi = $_POST['deskripsi'];
            if (!empty($tglTrs) && !empty($dana) && !empty($nominal) && !empty($deskripsi)) {

                $sql = "UPDATE tb_pengeluaran SET
                tglTrs = '$tglTrs',
                dana = '$dana',
                deskripsi ='$deskripsi',
                nominal = '$nominal'
                WHERE id = '$id'
                ";

                $query = mysqli_query($this->conn, $sql);
                if ($query) {
                    header("Location: pengeluaran");
                } else {
                    header("Location: pengeluaran");
                }
            }
        }
    }
}
