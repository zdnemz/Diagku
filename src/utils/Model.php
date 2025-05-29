<?php
class Model
{
    protected $db;

    public function __construct()
    {
        $config = require __DIR__ . '/../configs/index.php';
        $db = $config['db'];

        try {
            $this->db = new PDO("mysql:host={$db['host']};dbname={$db['name']}", $db['user'], $db['pass']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
}
