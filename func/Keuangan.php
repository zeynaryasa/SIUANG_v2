<?php
class Keuangan
{
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "root";
    protected $db = "db_siuang_v2";
    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn == false) die("Gagal");
        return $this->conn;
    }

    public function dana()
    {
        $sql = "SELECT * FROM tb_dana";
        $query = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $dana[] = $row;
        }
        return $dana;
    }


    //pemasukan
    public function hitungPemasukanIuran()
    {
        $sql = "SELECT SUM(nominal) as totalPemasukanIuran FROM tb_pemasukan WHERE dana = 'IURAN'";
        $query = mysqli_query($this->conn, $sql);
        $totalPemasukanIuran = mysqli_fetch_array($query);
        $rp = $totalPemasukanIuran['totalPemasukanIuran'];
        $hasilPemasukanIuran = "Rp." . number_format($rp, 0, ',', '.');
        return $hasilPemasukanIuran;
    }


    public function hitungPemasukanKas()
    {
        $sql = "SELECT SUM(nominal) as totalPemasukanKas FROM tb_pemasukan WHERE dana = 'KAS'";
        $query = mysqli_query($this->conn, $sql);
        $totalPemasukanKas = mysqli_fetch_array($query);
        $rp = $totalPemasukanKas['totalPemasukanKas'];
        $hasilPemasukanKas = "Rp." . number_format($rp, 0, ',', '.');
        return $hasilPemasukanKas;
    }

    public function totalPemasukan()
    {
        $sql = "SELECT SUM(nominal) AS totalPemasukan FROM tb_pemasukan";
        $query = mysqli_query($this->conn, $sql);
        $totalPemasukan = mysqli_fetch_array($query);
        $rp = $totalPemasukan['totalPemasukan'];
        $HasilTotalPemasukan = "Rp." . number_format($rp, 0, ',', '.');
        return $HasilTotalPemasukan;
    }

    //pengeluaran
    public function hitungPengeluaranIuran()
    {
        $sql = "SELECT SUM(nominal) as totalPengeluaranIuran FROM tb_pengeluaran WHERE dana = 'IURAN'";
        $query = mysqli_query($this->conn, $sql);
        $totalPengeluaranIuran = mysqli_fetch_array($query);
        $rp = $totalPengeluaranIuran['totalPengeluaranIuran'];
        $hasilPengeluaranIuran = "Rp." . number_format($rp, 0, ',', '.');
        return $hasilPengeluaranIuran;
    }


    public function hitungPengeluaranKas()
    {
        $sql = "SELECT SUM(nominal) as totalPengeluaranKas FROM tb_pengeluaran WHERE dana = 'KAS'";
        $query = mysqli_query($this->conn, $sql);
        $totalPengeluaranKas = mysqli_fetch_array($query);
        $rp = $totalPengeluaranKas['totalPengeluaranKas'];
        $hasilPengeluaranKas = "Rp." . number_format($rp, 0, ',', '.');
        return $hasilPengeluaranKas;
    }

    public function totalPengeluaran()
    {
        $sql = "SELECT SUM(nominal) AS totalPengeluaran FROM tb_pengeluaran";
        $query = mysqli_query($this->conn, $sql);
        $totalPengeluaran = mysqli_fetch_array($query);
        $rp = $totalPengeluaran['totalPengeluaran'];
        $HasilTotalPengeluaran = "Rp." . number_format($rp, 0, ',', '.');
        return $HasilTotalPengeluaran;
    }


    public function saldoKas()
    {
        $sql1 = "SELECT SUM(nominal) as totalPemasukanKas FROM tb_pemasukan WHERE dana = 'KAS'";
        $query1 = mysqli_query($this->conn, $sql1);
        $totalPemasukanKas = mysqli_fetch_array($query1);
        $rp1 = $totalPemasukanKas['totalPemasukanKas'];

        $sql2 = "SELECT SUM(nominal) as totalPengeluaranKas FROM tb_pengeluaran WHERE dana = 'KAS'";
        $query2 = mysqli_query($this->conn, $sql2);
        $totalPengeluaranKas = mysqli_fetch_array($query2);
        $rp2 = $totalPengeluaranKas['totalPengeluaranKas'];

        $rp3 = $rp1 - $rp2;
        $saldoKas = "Rp." . number_format($rp3, 0, ',', '.');
        return $saldoKas;
    }

    public function saldoIuran()
    {
        $sql1 = "SELECT SUM(nominal) as totalPemasukanIuran FROM tb_pemasukan WHERE dana = 'IURAN'";
        $query1 = mysqli_query($this->conn, $sql1);
        $totalPemasukanKas = mysqli_fetch_array($query1);
        $rp1 = $totalPemasukanKas['totalPemasukanIuran'];

        $sql2 = "SELECT SUM(nominal) as totalPengeluaranIuran FROM tb_pengeluaran WHERE dana = 'IURAN'";
        $query2 = mysqli_query($this->conn, $sql2);
        $totalPengeluaranIuran = mysqli_fetch_array($query2);
        $rp2 = $totalPengeluaranIuran['totalPengeluaranIuran'];

        $rp3 = $rp1 - $rp2;
        $saldoIuran = "Rp." . number_format($rp3, 0, ',', '.');
        return $saldoIuran;
    }


    public function saldoTotal()
    {
        $saldoKas = $this->saldoKas();
        $saldoIuran = $this->saldoIuran();

        // Menghapus prefix 'Rp.' dan titik, lalu mengubah format angka
        $rpKas = str_replace(',', '', str_replace('.', '', substr($saldoKas, 3)));
        $rpIuran = str_replace(',', '', str_replace('.', '', substr($saldoIuran, 3)));

        // Menjumlahkan saldo kas dan saldo iuran
        $rpTotal = $rpKas + $rpIuran;

        // Mengubah format angka kembali ke format rupiah
        $saldoTotal = "Rp." . number_format($rpTotal, 0, ',', '.');

        return $saldoTotal;
    }
}
