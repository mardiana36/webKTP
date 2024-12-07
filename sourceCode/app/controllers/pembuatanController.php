<?php
echo `
<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>`;
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/models/pembuatan.php');
class pembuatanController{
    private $db;
    private $pembuatan;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pembuatan = new pembuatan($this->db);
    }

    public function pembuatan()
    {
        require "app/views/pembuatan/index.php";
    }
}
