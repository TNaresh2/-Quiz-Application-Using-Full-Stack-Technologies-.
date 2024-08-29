<?php
include 'db_connection.php';

// Add new category
if(isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $query = "INSERT INTO Categories (name) VALUES ('$category_name')";
    mysqli_query($conn, $query);
}

// Delete category
if(isset($_POST['delete_category'])) {
    $category_id = $_POST['category_id'];
    $query = "DELETE FROM Categories WHERE category_id = $category_id";
    mysqli_query($conn, $query);
}
?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<div class="back">
    <div class="d-flex flex-row mb-3">
    <div class="p-2"><a href="view_signup.php">View loggedin Users</a></div>
        <div class="p-2"><a href="view_users.php">View Registered Users</a></div>
        <div class="p-2"><a href="manage_categories.php">Manage Categories</a></div>
        <div class="p-2"><a href="manage_questions.php">Manage Questions</a></div>
        <div class="p-2"><a href="score.php">score</a></div>
        <div class="p-2"><a href="adminlogout.php">logout</a></div>
        <!-- <div class="p-2">Flex item 3</div> -->
      </div>
      </div>
    <div class="container">
        <h1>Manage Categories</h1>
        <form method="POST">
            <label for="category_name">Category Name:</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
            <button type="submit" class="btn btn-primary" name="add_category">Add Category</button>
        </form>
        <hr>
        <h2>Existing Categories</h2>
        <ul>
            <?php
            $query = "SELECT * FROM Categories";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>{$row['name']} <form method='POST'><input type='hidden' name='category_id' value='{$row['category_id']}'><button type='submit' class='btn btn-primary' name='delete_category'>Delete</button></form></li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
<?php include("footer.php"); ?>