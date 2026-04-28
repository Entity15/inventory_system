<link rel="stylesheet" href="style.css">
<?php include 'db.php';

$id = $_GET['id'];

// Fetch existing data
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<div class="container">
<h2>Edit Product</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $row['product_name']; ?>" required><br><br>
    Category: <input type="text" name="category" value="<?php echo $row['category']; ?>" required><br><br>
    Price: <input type="text" name="price" value="<?php echo $row['price']; ?>" required><br><br>
    Quantity: <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" required><br><br>

    <button type="submit">Update Product</button>
</form>

<?php
if ($_POST) {

    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn, "UPDATE products SET
        product_name='$name',
        category='$category',
        price='$price',
        quantity='$quantity'
        WHERE id=$id");

    header("Location: index.php");
}
?>
</div>