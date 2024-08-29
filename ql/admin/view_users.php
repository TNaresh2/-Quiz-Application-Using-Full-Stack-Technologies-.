<?php include("header.php"); ?>
<?php
// Include database connection
include 'db_connection.php';

// Fetch registered users from the database
$query = "SELECT * FROM registration";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registered Users</title>
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>gender</th>
                <th>dob</th>
                <th>contact_number1</th>
                <th>contact_number1</th>
                <th>college</th>
                <th>street</th>
                <th>city</th>
                <th>state</th>
                <th>pincode</th>
                <th>User_image</th>
                
                <!-- Add more columns as needed -->
            </tr>
            
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['contact_number1']; ?></td>
                    <td><?php echo $row['contact_number2']; ?></td>
                    <td><?php echo $row['street']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['state']; ?></td>
                    <td><?php echo $row['pincode']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                   <!-- <td><?php echo $row['image_path']; ?></td>-->
                   
                    <td><img src="<?php echo $row['image_path']; ?>" alt="User Image"></td>    
        
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
