<?php
require_once '../auth/check_auth.php';
require_once '../config/db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM employees WHERE id = ?");
$stmt->execute([$id]);

header('Location: employee_list.php');
?>
