<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("Product not found.");
}

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($product['name']) ?></h1>
    <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width:300px; height:300px;">
    <p><?= htmlspecialchars($product['description']) ?></p>
    <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
    <p>Stock: <?= htmlspecialchars($product['stock']) ?></p>
    <form action="add_to_cart.php" method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <button type="submit">Add to Cart</button>
    </form>
    <a href="index.php">Back to Products</a>
</body>
</html>

