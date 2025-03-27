<?php
class Database {
    private $host = "localhost";
    private $db_name = "php_mvc";
    private $username = "root";
    private $password = "123456";
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Lỗi kết nối: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
?>
