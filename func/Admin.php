<?php

require 'Database.php';
//mengelola data admin
class Admin extends Database
{
    public function tampilDataAdmin()
    {
        $query = mysqli_query($this->conn, "SELECT * FROM tb_admin ORDER BY id DESC");
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function hitungAdmin()
    {
        $sql = "SELECT * FROM tb_admin";
        $query = mysqli_query($this->conn, $sql);
        $jumlahAdmin = mysqli_num_rows($query);
        return $jumlahAdmin;
    }

    public function cariDataById()
    {
        $sql = "SELECT * FROM tb_admin WHERE id = '" . $_POST['id'] . "'";
        $query = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertDataAdmin()
    {
        if (isset($_POST)) {
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $foto = $_POST['foto'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (!empty($nik) && !empty($nama) && !empty($foto) && !empty($username) && !empty($password)) {
                // Cek apakah NIK sudah terdaftar
                $sql_check = "SELECT * FROM tb_admin WHERE nik = '$nik'";
                $query_check = mysqli_query($this->conn, $sql_check);
                if (mysqli_num_rows($query_check) > 0) {
                    header("Location: insertAdmin");
                    return;
                }
                // Jika NIK belum terdaftar, lanjutkan proses insert
                $sql = "INSERT INTO tb_admin VALUES(
                NULL,
                '$nik',
                '$nama',
                '$foto',
                '$username',
                '$password')";
                $query = mysqli_query($this->conn, $sql);
                if ($query) {
                    $this->set_flash_message('pesan', 'Insert Data Berhasil');
                    header("Location: admin");
                } else {
                    $this->set_flash_message('pesan', 'Insert Data Gagal');
                    header("Location: insertAdmin");
                }
            }
        }
    }

    public function deleteDataAdmin()
    {
        if (isset($_POST)) {
            $nik = $_POST['nik'];
            if (!empty($nik)) {
                $sql = "DELETE FROM tb_admin WHERE nik = '$nik'";
                $query = mysqli_query($this->conn, $sql);

                if ($query) {
                    $this->set_flash_message('pesan', 'Hapus Data Berhasil');
                    header("Location: admin");
                } else {
                    $this->set_flash_message('pesan', 'Hapus Data Gagal');
                    header("Location: admin");
                }
            }
        }
    }

    public function updateDataAdmin()
    {
        if (isset($_POST)) {
            $id = $_POST['id'];
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (!empty($id) && !empty($nik) && !empty($nama) && !empty($username) && !empty($password)) {
                // Cek apakah NIK baru sudah ada di database
                $sql_check = "SELECT * FROM tb_admin WHERE nik = '$nik' AND id != '$id'";
                $query_check = mysqli_query($this->conn, $sql_check);
                if (mysqli_num_rows($query_check) > 0) {
                    // Jika NIK baru sudah ada di database, redirect ke halaman admin
                    header("Location: admin");
                } else {
                    $sql = "UPDATE tb_admin SET
                nik = '$nik',
                nama = '$nama',
                username ='$username',
                password = '$password'
                WHERE id = '$id'
                ";

                    $query = mysqli_query($this->conn, $sql);
                    if ($query) {
                        $this->set_flash_message('pesan', 'Update Data Berhasil');
                        header("Location: admin");
                    } else {
                        $this->set_flash_message('pesan', 'Update Data Gagal');
                        header("Location: admin");
                    }
                }
            }
        }
    }
}
//end mengelola data admin
