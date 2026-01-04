<?php
require '../config/database-connection.php';
require '../repositories/user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$users = $userRepo->all();
?>

<h2>Users List</h2>
<a href="create.php">Add new user</a><br><br>
<table border=1>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td>
            <a href="edit.php?id=<?= $user['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $user['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>