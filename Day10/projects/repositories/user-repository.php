<?php
class UserRepository {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function all() {
        $sql = 'SELECT * FROM auth';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($name, $email, $password) {
        $sql = 'INSERT INTO auth (name, email, password) VALUES (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $email, $password]);
    }
    public function findByEmail($email) {
        $sql = 'SELECT * FROM auth WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $name, $email, $password) {
        $sql = 'UPDATE auth SET name = ?, email = ?, password = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $email, $password, $id]);
    }
    public function delete($id) {
        $sql = 'DELETE FROM auth WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>