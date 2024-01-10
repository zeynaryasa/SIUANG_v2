<?php
require 'Keuangan.php';
class Pemasukan extends Keuangan
{
    public function tampildataPemasukan()
    {
        $sql = "SELECT * FROM tb_pemasukan ORDER BY id DESC";
        $query = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function cariDataById()
    {
        $sql = "SELECT * FROM tb_pemasukan WHERE id = '" . $_POST['id'] . "'";
        $query = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertDataPemasukan()
    {
        if (isset($_POST)) {
            $tglTrs = $_POST['tglTrs'];
            $dana = $_POST['dana'];
            $deskripsi = $_POST['deskripsi'];
            $nominal = $_POST['nominal'];
            if (!empty($tglTrs) && !empty($dana)  && !empty($deskripsi) && !empty($nominal)) {
                $sql = "INSERT INTO tb_pemasukan VALUES(
                NULL,
                '$tglTrs',
                '$dana',
                '$deskripsi',
                '$nominal')";
                $query = mysqli_query($this->conn, $sql);
                if ($query) {
                    header("Location: pemasukan");
                } else {
                    header("Location: insertPemasukan");
                }
            }
        }
    }

    public function deleteDataPemasukan()
    {
        if (isset($_POST)) {
            $id = $_POST['id'];
            if (!empty($id)) {
                $sql = "DELETE FROM tb_pemasukan WHERE id = '$id'";
                $query = mysqli_query($this->conn, $sql);

                if ($query) {
                    header("Location: pemasukan");
                } else {
                    header("Location: pemasukan");
                }
            }
        }
    }

    public function updateDataPemasukan()
    {
        if (isset($_POST)) {
            $id = $_POST['id'];
            $tglTrs = $_POST['tglTrs'];
            $dana = $_POST['dana'];
            $nominal = $_POST['nominal'];
            $deskripsi = $_POST['deskripsi'];
            if (!empty($tglTrs) && !empty($dana) && !empty($nominal) && !empty($deskripsi)) {

                $sql = "UPDATE tb_pemasukan SET
                tglTrs = '$tglTrs',
                dana = '$dana',
                deskripsi ='$deskripsi',
                nominal = '$nominal'
                WHERE id = '$id'
                ";

                $query = mysqli_query($this->conn, $sql);
                if ($query) {
                    header("Location: pemasukan");
                } else {
                    header("Location: pengeluaran");
                }
            }
        }
    }
}
