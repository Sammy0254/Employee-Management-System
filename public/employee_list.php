<?php
require_once '../auth/check_auth.php';
require_once '../config/db.php';

$stmt = $pdo->query("SELECT * FROM employees");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
    <tr>
        <td><?= $employee['id'] ?></td>
        <td><?= $employee['name'] ?></td>
        <td><?= $employee['email'] ?></td>
        <td><?= $employee['phone'] ?></td>
        <td>
            <a href="edit_employee.php?id=<?= $employee['id'] ?>">Edit</a>
            <a href="delete_employee.php?id=<?= $employee['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}
