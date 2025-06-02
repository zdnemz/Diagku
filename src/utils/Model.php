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

    public function query($sql, $params = array())
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetch($sql, $params = array())
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql, $params = array())
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = array())
    {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
}
