<?php
require_once '../auth/check_auth.php';
require_once '../config/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$employee) {
    die("Employee not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("UPDATE employees SET name = ?, email = ?, phone = ?, department = ?, position = ?, salary = ? WHERE id = ?");
    $stmt->execute([$name, $email, $phone, $department, $position, $salary, $id]);

    header('Location: employee_list.php');
}
?>

<?php include '../includes/header.php'; ?>
<h2>Edit Employee</h2>
<form method="POST">
    <input type="text" name="name" value="<?= $employee['name']; ?>" required>
    <input type="email" name="email" value="<?= $employee['email']; ?>" required>
    <input type="text" name="phone" value="<?= $employee['phone']; ?>" required>
    <input type="text" name="department" value="<?= $employee['department']; ?>">
    <input type="text" name="position" value="<?= $employee['position']; ?>">
    <input type="number" step="0.01" name="salary" value="<?= $employee['salary']; ?>">
    <button type="submit">Update</button>
</form>
<?php include '../includes/footer.php'; ?>
