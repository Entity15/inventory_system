<link rel="stylesheet" href="style.css">
<?php include 'db.php'; ?>

<div class="container">
<h2>Add Product</h2>

<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Category: <input type="text" name="category"><br><br>
    Price: <input type="text" name="price"><br><br>
    Quantity: <input type="text" name="quantity"><br><br>

    <button type="submit" name="submit">Add Product</button>
</form>

<?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if ($name == "" || $category == "" || $price == "" || $quantity == "") {
        echo "All fields are required!";
    } else {
        mysqli_query($conn, "INSERT INTO products 
        (product_name, category, price, quantity) 
        VALUES ('$name', '$category', '$price', '$quantity')");

        header("Location: index.php");
    }
}
?>
</div>
