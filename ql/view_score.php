<?php
// Start session
session_start();

// Check if college_id is set in session
if (!isset($_SESSION['email'])) {
    die("You must be logged in to view this page.");
}

$email = $_SESSION['email'];

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch scores from the database for the logged-in user
$sql = "SELECT s.email, s.score, s.date, c.name AS category_name, 
               (SELECT COUNT(*) FROM Questions q WHERE q.category_id = s.category_id) AS total_questions
        FROM Scores s
        JOIN Categories c ON s.category_id = c.category_id
        WHERE s.email = '$email'
        ORDER BY s.date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Scores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Your Scores</h1>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th>College ID</th>
            <th>Category</th>
            <th>Score</th>
            <th>Total Questions</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['category_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['score']) . "</td>";
                echo "<td>" . htmlspecialchars($row['total_questions']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No scores found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>