<?php
interface StorageInterface {
    public function save($data);
}
class FileStorage implements StorageInterface {
    public function save($data) {
        return "Data saved to file : $data";
    }
}
class DatabaseStorage implements StorageInterface {
    public function save($data) {
        return "Data saved to database : $data";
    }
}
class UserService {
    private $storage;
    public function __construct($storage) {
        $this->storage = $storage;
    }
    public function register($username) {
        return $this->storage->save($username);
    }
}
$service = new UserService(new DatabaseStorage());
echo $service->register("Ravi");
?>