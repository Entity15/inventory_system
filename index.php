<link rel="stylesheet" href="style.css">
<?php include 'db.php'; ?>

<div class="container">
<h2>Inventory Management System</h2>

<a href="add.php">Add Product</a>

<br><br>

<form method="GET">
    <input type="text" name="search" 
value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>" 
placeholder="Search by name or category">
    <button type="submit">Search</button>
</form>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Actions</th>
</tr>

<?php
if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = $_GET['search'];

    $result = mysqli_query($conn, 
        "SELECT * FROM products 
        WHERE product_name LIKE '%$search%' 
        OR category LIKE '%$search%'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM products");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['product_name']}</td>
        <td>{$row['category']}</td>
        <td>{$row['price']}</td>
        <td>{$row['quantity']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Edit</a>
            " . '<a href="delete.php?id='.$row['id'].'" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a>' . "
        </td>
    </tr>";
}
?>
</table>
</div>