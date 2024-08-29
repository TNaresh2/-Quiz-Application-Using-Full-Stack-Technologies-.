<?php include("header.php"); ?>
<?php
// Include database connection
include 'db_connection.php';

// Fetch registered users from the database
$query = "SELECT * FROM signup";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View login Users</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
    <style>
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
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
        <h1>Registered Users</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>password</th>
                <th>confirm password</th>
                <th>Date and time</th>
                
                <!-- Add more columns as needed -->
            </tr>
            
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['confirmpassword']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
<?php include("footer.php"); ?>