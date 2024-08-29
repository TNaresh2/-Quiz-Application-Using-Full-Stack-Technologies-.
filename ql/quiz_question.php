<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="st.css">
    <style>
        .con{
            margin-top: 50px;
            margin-left: 350px;
        }
    </style>
</head>
<body style="background-image: url('img/register1.jpg'); background-repeat: no-repeat; background-size: cover;"><br><br><br><br>
    <div class="container con">
        <h1>Welcome To Programming Quiz</h1>
        <div id="timer" class="text-right text-danger font-weight-bold my-3"></div>
        <?php
        session_start();
        include_once 'db.php';

        // Redirect to category selection if questions or current question are not set
        if (!isset($_SESSION['questions']) || !isset($_SESSION['current_question'])) {
            header("Location: category_selection.php");
            exit();
        }

        $current_question_index = $_SESSION['current_question'];
        $questions = $_SESSION['questions'];

        // Check for valid current question index
        if (!isset($questions[$current_question_index])) {
            echo "Error: Invalid question index.";
            exit();
        }

        $current_question = $questions[$current_question_index];
        $question_id = $current_question['question_id'];

        // Fetch options for the current question
        $query = "SELECT * FROM Options WHERE question_id = $question_id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo '<h3>' . htmlspecialchars($current_question['question_text']) . '</h3>';
        echo '<form id="quizForm" action="quiz_process.php" method="post">';
        foreach ($options as $option) {
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="radio" name="option" id="option' . htmlspecialchars($option['option_id']) . '" value="' . htmlspecialchars($option['option_id']) . '">';
            echo '<label class="form-check-label" for="option' . htmlspecialchars($option['option_id']) . '">' . htmlspecialchars($option['option_text']) . '</label>';
            echo '</div>';
        }
        echo '<button type="submit" class="btn btn-primary mt-3">Submit Answer</button>';
        echo '</form>';

        if ($current_question_index > 0) {
            echo '<a href="quiz_previous.php" class="btn btn-secondary mt-3">Previous</a>';
        }
        if ($current_question_index < count($questions) - 1) {
            echo '<a href="quiz_next.php" class="btn btn-secondary mt-3">Next</a>';
        } else {
            echo '<a href="quiz_result.php" class="btn btn-success mt-3">Submit</a>';
        }

        if (!isset($_SESSION['fifty_fifty_used']) || !is_array($_SESSION['fifty_fifty_used'])) {
            $_SESSION['fifty_fifty_used'] = [];
        }

        $category_id = $_SESSION['category_id'];
        ?>

        <button id="fiftyFifty" class="btn btn-info mt-3" <?php if (in_array($category_id, $_SESSION['fifty_fifty_used'])) echo 'disabled'; ?>>50/50</button>

    </div>

    <script>
        // Timer
        var timeLeft = <?php echo $_SESSION['category_time']; ?>;
        var timerElement = document.getElementById("timer");
        function updateTimer() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;
            timerElement.textContent = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                document.getElementById("quizForm").submit();
            }
            timeLeft--;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_timer.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("timeLeft=" + timeLeft);
        }
        var timerInterval = setInterval(updateTimer, 1000);

        // 50/50 Button
        document.getElementById('fiftyFifty').addEventListener('click', function() {
            let options = document.querySelectorAll('.form-check');
            let incorrectOptions = Array.from(options).filter(option => !option.querySelector('input').checked && !option.querySelector('input').disabled);

            if (incorrectOptions.length > 2) {
                let toRemove = incorrectOptions.slice(0, 2);
                toRemove.forEach(option => option.style.display = 'none');
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "update_fifty_fifty.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("category_id=" + <?php echo $category_id; ?>);
                this.disabled = true;
            }
        });
    </script>
</body>
</html>
