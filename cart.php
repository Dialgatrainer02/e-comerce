<?php
session_start();
require 'db.php';

$cart = $_SESSION['cart'] ?? [];
$products = [];

if ($cart) {
    $ids = implode(',', array_keys($cart));
    $stmt = $pdo->query("SELECT * FROM products WHERE id IN ($ids)");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <?php if ($products): ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <?= htmlspecialchars($product['name']) ?> 
                    x <?= $cart[$product['id']] ?> 
                    = $<?= $cart[$product['id']] * $product['price'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <a href="index.php">Continue Shopping</a>
</body>
</html>
