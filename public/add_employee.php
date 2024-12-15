<?php
require_once '../auth/check_auth.php';
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("INSERT INTO employees (name, email, phone, department, position, salary) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $department, $position, $salary]);

    header('Location: employee_list.php');
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="text" name="department" placeholder="Department">
    <input type="text" name="position" placeholder="Position">
    <input type="number" step="0.01" name="salary" placeholder="Salary">
    <button type="submit">Add Employee</button>
</form>
