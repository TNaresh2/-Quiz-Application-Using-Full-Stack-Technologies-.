<?php
// Start session
session_start();

// Check if college_id is set
if (!isset($_SESSION['email'])) {
     die("Email is not set.");
}

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

$email = $_SESSION['email'];
$sql = "SELECT * FROM registration WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No user found.";
    exit();
}

$conn->close();

// Get current date and validity date (two months from current date)
$current_date = date("Y-m-d");
$validity_date = date("Y-m-d", strtotime("+2 months"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Achievement</title>
    <link rel="stylesheet" href="css/cer.css">
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-border">
            <div class="certificate-inner-border">
                <div class="certificate-content">
                    <div class="certificate-header">
                        <!-- <img src="img/qz2.JPG" alt="Logo" class="logo"> -->
                        <h1>Certificate of Achievement </h1>
                        
                    </div>
                    <div class="certificate-body">
                        <h4 >This is to certify that</h4>
                        <h2><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h2>
                        <p>has successfully completed the quiz with outstanding performance.</p>
                        <div class="certificate-details">
                            <div class="user-image-container">
                                <img src="<?php echo $row['image_path']; ?>" alt="User Image" class="user-image">
                                <div class="image-icon">&#x1F4F7;</div>
                            </div>
                            <div class="certificate-details-left">
                                <!--<p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                
                                <p><strong>College:</strong> <?php echo $row['college']; ?></p>
                                <p><strong>Date:</strong> <?php echo $current_date; ?></p>
                                <p><strong>Valid Until:</strong> <?php echo $validity_date; ?></p>-->
                                <p><strong>This certificate is given to </strong><h3><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h3><strong>   for the successful partcipation in QUIZ....</strong> </p>
                                <p><strong>Date:</strong> <?php echo $current_date; ?></p>
                                <p><strong>Valid Until:</strong> <?php echo $validity_date; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="certificate-footer">
                        <p>Congratulations! You can now borrow any 2 books from the library.</p>
                        <!--<button onclick="window.print()">Print Certificate</button>-->
                        <button onclick="window.print()">Print Certificate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
