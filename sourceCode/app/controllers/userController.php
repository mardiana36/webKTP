<?php
echo `
<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>`;
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/models/user.php');
class userController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new user($this->db);
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loggedIn = false;
            $userIdentity = $_POST['usernameOrEmail'];
            $password = $_POST['password'];
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $stmt = $this->user->read();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $loggedIn = false;
            foreach ($data as $user) {
                if (($user['email'] == $userIdentity || $user['username'] == $userIdentity) &&  password_verify($password, $user['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    $loggedIn = true;
                    if ($user['role'] == '0'){
                        $_SESSION['idU'] = $user['id'];
                        echo "<script>window.location.href = 'index.php'</script>";
                    } else if($user['role'] == '1'){
                        echo "<script>window.location.href = 'index.php?action=dashboard'</script>";
                    }
                    break;
                }
            }
            if ($loggedIn != true) {
                echo "<script>
                            document.addEventListener('DOMContentLoaded', () => {
                                    alertWarning('Oops!','Username/Email/Password anda salah!','index.php?action=login');
                              });</script>";
            }
        } else {
            require "app/views/login/index.php";
        }
    }

    public function regis(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = '0';

            $this->user->username = $username;
            $this->user->email = $email;
            $this->user->password = password_hash($password,PASSWORD_DEFAULT);
            $this->user->role = $role;
            if ($this->user->create()) {
                echo "<script>
                            document.addEventListener('DOMContentLoaded', () => {
                                    alertSuksessH('Selamat','Anda berhasil Regis silahkan login', 'index.php?action=login');
                              });</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            require "app/views/registrasi/index.php";
          
        }
    }
    public function logout()
    {
            session_unset();
            session_destroy();
            echo "<script>window.location.href = 'index.php';</script>";
    }
    public function checkUser()
    {
        $stmt = $this->user->read();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($data)){
            return $data;
        }
        return false;
    }
}
