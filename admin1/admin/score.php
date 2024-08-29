<?php
include 'db_connection.php';
?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Scores</title>
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
    <h1>Registered Users Scores</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Category</th>
                <th>Total Questions</th>
                <th>Score</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT Scores.score_id, Scores.email, registration.first_name, registration.last_name, registration.email, 
                             Categories.name AS category_name, Scores.score, Scores.date, 
                             (SELECT COUNT(*) FROM Questions WHERE Questions.category_id = Scores.category_id) AS total_questions
                      FROM Scores 
                      JOIN registration ON Scores.email= registration.email
                      JOIN Categories ON Scores.category_id = Categories.category_id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['score_id']}</td>
                       
                        <td>{$row['first_name']}</td>
                        <td>{$row['last_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['category_name']}</td>
                        <td>{$row['total_questions']}</td>
                        <td>{$row['score']}</td>
                        <td>{$row['date']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No scores found</td></tr>";
            }
            ?>
        </tbody>
    </table>
        </div>
        </div>

</body>
</html>

<?php
mysqli_close($conn);
?>
<?php include("footer.php"); ?>