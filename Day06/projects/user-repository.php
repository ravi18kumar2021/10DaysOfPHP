<?php
class UserRepository {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $email) {
        $sql = 'INSERT INTO users (name, email) VALUES (?, ?)';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $email]);
    }

    public function all() {
        $stmt = $this->pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $email) {
        $stmt = $this->pdo->prepare('UPDATE users SET email = ? WHERE id = ?');
        return $stmt->execute([$email, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
?>