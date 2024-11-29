<?php
session_start();

if (!isset($_POST['id'])) {
    die("Invalid request.");
}

$id = (int)$_POST['id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = 1;
} else {
    $_SESSION['cart'][$id]++;
}

header("Location: cart.php");
exit;
?>

