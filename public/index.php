<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: employee_list.php');
} else {
    header('Location: login.php');
}
?>
