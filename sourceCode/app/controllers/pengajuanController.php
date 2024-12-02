<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>
<?php
require_once 'app/config/db.php';
require_once 'app/models/user.php';
class pengajuanController{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new user($this->db);
    }

    public function pengajuan()
    {
        require "app/views/pengajuan/index.php";
    }
}
