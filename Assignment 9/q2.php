<?php
$filename = "products.txt";
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$products = [];
foreach ($lines as $line) {
    $parts = explode(",", $line);
    $name = trim($parts[0]);
    $price = (int)trim($parts[1]);
    $products[$name] = $price;
}
asort($products);
echo "<h3>Product List (Sorted by Price - Ascending)</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Product Name</th><th>Price</th></tr>";
foreach ($products as $name => $price) {
    echo "<tr><td>$name</td><td>$price</td></tr>";
}
echo "</table>";
?>
