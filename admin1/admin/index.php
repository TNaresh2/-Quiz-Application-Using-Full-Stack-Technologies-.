
<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- <div class="container">
        <h1>Welcome to Admin Panel</h1>
        <ul>
            <li><a href="view_users.php">View Registered Users</a></li>
            <li><a href="manage_categories.php">Manage Categories</a></li>
            <li><a href="manage_questions.php">Manage Questions</a></li>
            <li><a href="score.php">score</a></li>
            <li><a href="adminlogout.php">logout</a></li>
             Add more links for other functionalities
        </ul>
    </div>  --> 
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
      <div class="info mt-4 p-3">
            <h2>Admin Dashboard Instructions</h2>
            <p>Welcome to the Admin Panel! Here you can manage various aspects of the application:</p>
            <ul>
                <li><strong>View Registered Users</strong>: Click to see a list of all users registered on the platform. You can view user details and manage their accounts.</li>
                <li><strong>Manage Categories</strong>: Click to create, edit, or delete categories. Categories help organize content on the platform.</li>
                <li><strong>Manage Questions</strong>: Click to manage the questions available on the platform. You can add, edit, or delete questions as needed.</li>
                <li><strong>Score</strong>: Click to view and manage scores. This section allows you to track user performance and view statistics.</li>
                <li><strong>Logout</strong>: Click to log out of the admin panel and end your session securely.</li>
            </ul>
            <p>Please make sure to save any changes before navigating to another section. If you encounter any issues, contact support for assistance.</p>
        </div>
    </div>
      
</body>
</html>
<?php include("footer.php"); ?>