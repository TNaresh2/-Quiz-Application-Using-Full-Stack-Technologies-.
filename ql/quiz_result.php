<?php
session_start();

if (!isset($_SESSION['score']) || !isset($_SESSION['questions'])) {
    header("Location: category_selection.php");
    exit();
}

// Check if email is set
if (!isset($_SESSION['email'])) {
    die("Email is not set.");
}

// Get the current category
$category = $_SESSION['category_id'];

// Define and initialize the score and total_questions variables
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
$total_questions = isset($_SESSION['questions']) ? count($_SESSION['questions']) : 0;

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

// Store the score in the database for the current category
$email = $_SESSION['email'];
$stmt = $conn->prepare("INSERT INTO scores (email, category_id, score) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE score = ?");
$stmt->bind_param("ssii", $email, $category, $score, $score);
$stmt->execute();
$stmt->close();
$conn->close();

// Display the result
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="res.css">
</head>
<body style="background-image: url('img/register1.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="container mt-5">
        <h1 class="text-center qc">Quiz Result</h1>
        <p class="text-center sc">You scored <?php echo $score; ?> out of <?php echo $total_questions; ?> </p>
        <?php if ($score > $total_questions / 2): ?>
            <div class="text-center">
                <a href="display.php" class="btn btn-success">Download Certificate</a>
            </div>
        <?php else: ?>
            <p class="text-center text-danger">Sorry, you did not pass the quiz.</p>
        <?php endif; ?>
        <div class="text-center mt-3">
            <a href="category_selection.php" class="btn btn-primary">Back to Categories</a>
        </div>
    </div>
</body>
</html>
<?php
// Reset the session variables for the next attempt
unset($_SESSION['score']);
unset($_SESSION['questions']);
unset($_SESSION['category']);
?>
