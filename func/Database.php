<?php
class Database
{
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "root";
    protected $db = "db_siuang_v2";
    protected $conn;

    public function __construct()
    {
        session_start();
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn == false) die("Gagal");
        return $this->conn;
    }

    function set_flash_message($name, $message)
    {
        $_SESSION['flash'][$name] = [
            'message' => $message,
        ];
    }

    function flash_message($name)
    {
        if (isset($_SESSION['flash'][$name])) {
            $message = $_SESSION['flash'][$name];
            unset($_SESSION['flash'][$name]); // Menghapus flash message setelah ditampilkan
            return $message['message'];
        }
    }
}
