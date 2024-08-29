<?php include("header.php"); ?>
<?php
include 'db_connection.php';

// Add new question and options
if(isset($_POST['add_question'])) {
    $category_id = $_POST['category_id'];
    $question_text = $_POST['question_text'];
    $options = $_POST['options']; // Assuming options are submitted as an array

    // Insert question into Questions table
    $query = "INSERT INTO Questions (category_id, question_text) VALUES ('$category_id', '$question_text')";
    mysqli_query($conn, $query);

    // Get the question_id of the inserted question
    $question_id = mysqli_insert_id($conn);

    // Insert options into Options table
    foreach ($options as $option) {
        $option_text = $option['option_text'];
        $is_correct = isset($option['is_correct']) ? 1 : 0; // Check if 'is_correct' key exists
        $query = "INSERT INTO Options (question_id, option_text, is_correct) VALUES ('$question_id', '$option_text', '$is_correct')";
        mysqli_query($conn, $query);
    }
}

// Update question
if(isset($_POST['edit_question'])) {
    $question_id = $_POST['question_id'];
    $question_text = $_POST['question_text'];

    $query = "UPDATE Questions SET question_text = '$question_text' WHERE question_id = $question_id";
    mysqli_query($conn, $query);
}

// Delete question and options
if(isset($_POST['delete_question'])) {
    $question_id = $_POST['question_id'];
    
    // First delete associated options from Options table
    $query = "DELETE FROM Options WHERE question_id = $question_id";
    mysqli_query($conn, $query);
    
    // Then delete the question from Questions table
    $query = "DELETE FROM Questions WHERE question_id = $question_id";
    mysqli_query($conn, $query);
}

// Update option
if(isset($_POST['edit_option'])) {
    $option_id = $_POST['option_id'];
    $option_text = $_POST['option_text'];
    $is_correct = isset($_POST['is_correct']) ? 1 : 0; // Check if 'is_correct' key exists

    $query = "UPDATE Options SET option_text = '$option_text', is_correct = '$is_correct' WHERE option_id = $option_id";
    mysqli_query($conn, $query);
}

// Delete option
if(isset($_POST['delete_option'])) {
    $option_id = $_POST['option_id'];
    $query = "DELETE FROM Options WHERE option_id = $option_id";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Questions</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .category {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .question {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .option {
            margin-left: 20px;
        }
        form {
            display: inline;
        }
        textarea, input[type="text"] {
            width: 100%;
            box-sizing: border-box;
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
        <h1>Manage Questions and Options</h1>
        <form method="POST">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id">
                <?php
                $query = "SELECT * FROM Categories";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['category_id']}'>{$row['name']}</option>";
                }
                ?>
            </select><br><br>
            <label for="question_text">Question:</label>
            <textarea id="question_text" name="question_text" required></textarea><br><br>
            <label>Options:</label><br>
            <div id="options">
                <div class="option">
                    <input type="text" name="options[0][option_text]" required>
                    <label><input type="checkbox" name="options[0][is_correct]"> Correct</label>
                </div>
            </div>
            <button class="btn btn-primary" type="button" onclick="addOption()">Add Option</button><br><br>
            <button class="btn btn-primary" type="submit" name="add_question">Add Question</button>
        </form>
        <hr>
        <h2>Existing Questions</h2>
        <?php
        $query = "SELECT * FROM Categories";
        $categories_result = mysqli_query($conn, $query);
        while ($category = mysqli_fetch_assoc($categories_result)) {
            echo "<div class='category'><h3>{$category['name']}</h3>";

            $category_id = $category['category_id'];
            $query = "SELECT * FROM Questions WHERE category_id = $category_id";
            $questions_result = mysqli_query($conn, $query);
            while ($question = mysqli_fetch_assoc($questions_result)) {
                echo "<div class='question'>
                    <form method='POST'>
                        <input type='hidden' name='question_id' value='{$question['question_id']}'>
                        <textarea name='question_text' required>{$question['question_text']}</textarea>
                        <button class='btn btn-success' type='submit' name='edit_question'>Edit</button>
                        <button class='btn btn-danger' type='submit' name='delete_question'>Delete</button>
                    </form>";

                echo "<ul>";
                
                $question_id = $question['question_id'];
                $query = "SELECT * FROM Options WHERE question_id = $question_id";
                $options_result = mysqli_query($conn, $query);
                while ($option = mysqli_fetch_assoc($options_result)) {
                    echo "<li class='option'>
                        <form method='POST'>
                            <input type='hidden' name='option_id' value='{$option['option_id']}'>
                            <input type='text' name='option_text' value='{$option['option_text']}' required>
                            <label><input type='checkbox' name='is_correct' ".($option['is_correct'] ? "checked" : "")."> Correct</label>
                            <button class='btn btn-success' type='submit' name='edit_option'>Edit</button>
                            <button class='btn btn-danger' type='submit' name='delete_option'>Delete</button>
                        </form>
                    </li>";
                }
                echo "</ul></div>";
            }

            echo "</div>";
        }
        ?>
    </div>

    <script>
        let optionCount = 1;

        function addOption() {
            optionCount++;
            const optionsDiv = document.getElementById('options');
            const optionDiv = document.createElement('div');
            optionDiv.className = 'option';
            optionDiv.innerHTML = `
                <input type="text" name="options[${optionCount}][option_text]" required>
                <label><input type="checkbox" name="options[${optionCount}][is_correct]"> Correct</label>
            `;
            optionsDiv.appendChild(optionDiv);
        }
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>


<?php include("footer.php"); ?>

