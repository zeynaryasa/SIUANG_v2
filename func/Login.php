<?php
//login
class Login
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
    public function loginProses()
    {
        if (isset($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";
            $query = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_array($query);
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $row['nama'];
                header("Location: home");
            } else {
                header("Location: home");
            }
        }
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: ../index");
    }
}
//end login



//login control
if (isset($_POST['btn_login'])) {
    $login = new Login();
    $login->loginProses();
}

//logout control
if (isset($_GET['logout'])) {
    $logout = new Login();
    $logout->logout();
}
