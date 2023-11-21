<?php
require_once('../connection.php');
session_start();
if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
}

// Assuming you have the quiz_id in the URL parameter
if (isset($_GET['quiz_id'])) {
    $quiz_id = $_GET['quiz_id'];

    // Fetch quiz details
    $quiz_query = "SELECT * FROM quiz WHERE quiz_id = $quiz_id";
    $quiz_result = mysqli_query($con, $quiz_query);
    $quiz_row = mysqli_fetch_assoc($quiz_result);

    if ($quiz_row) {
        $quiz_name = $quiz_row['quiz_name'];

        // Fetch quiz questions
        $questions_query = "SELECT * FROM quiz_$quiz_id";
        $questions_result = mysqli_query($con, $questions_query);
        $questions = mysqli_fetch_all($questions_result, MYSQLI_ASSOC);

        // Shuffle the options for each question
        foreach ($questions as &$question) {
            $options = array($question['option_1'], $question['option_2'], $question['option_3'], $question['option_4']);
            shuffle($options);
            $question['options'] = $options;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Quiz Questions</title>

    <!-- bootstraps -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../wf/style.css" rel="stylesheet" type="text/css" />
    <link href="quiz_style.css" rel="stylesheet" type="text/css" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

    <link href="../wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../wf/assets/QuizITLogo.png" rel="apple-touch-icon" />

</head>

<body>
    <main class="containers">
        <div class="header text-center">
            <h1 class="display-4 Quiz_name"><?php echo $quiz_name; ?> Quiz</h1>
        </div>

        <div class="sidebar">
            <h2>Questions</h2>
            <ul id="questionList">
                <?php
                // Loop through existing questions and generate list items
                for ($i = 1; $i <= $quiz_row['questions']; $i++) {
                    echo '<li><a href="#question' . $i . '">Question ' . $i . '</a></li>';
                }
                ?>
            </ul>

            <!-- Add Question Button -->
            <form method="post" action="" id="addQuestionForm">
                <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                <button type="submit" name="addQuestion">Add Question</button>
            </form>

            <!-- Remove Question Button -->
            <form method="post" action="" id="removeQuestionForm">
                <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                <button type="submit" name="removeQuestion">Remove Last Question</button>
            </form>
        </div>

        <div class="main-content">
            <form method="post" class="row g-2" id="quiz-form">
                <?php
                $question_no = 1;
                foreach ($questions as &$question) {
                    echo '
                    <div class="quiz-question" id="question' . $quiz_row['questions'] . '">
                        <div class="question-container">
                            <h3>Question ' . $quiz_row['questions'] . '</h3>
                            <div class="col-md-23" >
                                <label for="q' . $question['quiz_no'] . '_qn">Question</label>
                                <input type="text" name="q' . $question['quiz_no'] . '_qn" value="' . htmlspecialchars($question['question']) . '" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23" >
                                <label for="q' . $question['quiz_no'] . '_op1">Option 1</label>
                                <input type="text" name="q' . $question['quiz_no'] . '_op1" value="' . htmlspecialchars($question['option_1']) . '" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23">
                                <label for="q' . $question['quiz_no'] . '_op2">Option 2</label>
                                <input type="text" name="q' . $question['quiz_no'] . '_op2" value="' . htmlspecialchars($question['option_2']) . '" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23" >
                                <label for="q' . $question['quiz_no'] . '_op3">Option 3</label>
                                <input type="text" name="q' . $question['quiz_no'] . '_op3" value="' . htmlspecialchars($question['option_3']) . '" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23" >
                                <label for="q' . $question['quiz_no'] . '_op4">Option 4</label>
                                <input type="text" name="q' . $question['quiz_no'] . '_op4" value="' . htmlspecialchars($question['option_4']) . '" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23">
                                <label for="q' . $question['quiz_no'] . '_answer">Correct Answer</label>
                                <select name="q' . $question['quiz_no'] . '_answer" class="form-control" required>
                                    <option value="option_1" ' . ($question['answer'] == $question['option_1'] ? 'selected' : '') . '>Option 1</option>
                                    <option value="option_2" ' . ($question['answer'] == $question['option_2'] ? 'selected' : '') . '>Option 2</option>
                                    <option value="option_3" ' . ($question['answer'] == $question['option_3'] ? 'selected' : '') . '>Option 3</option>
                                    <option value="option_4" ' . ($question['answer'] == $question['option_4'] ? 'selected' : '') . '>Option 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    ';
                    $question_no++;
                }
                ?>
            </form>
        </div>
    </main>
</body>

<footer>
    <script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
    <script src='../language.js'></script>
    <script src="quiz.js"></script>
</footer>

</html>

<?php
// Check if the "Add Question" button is clicked
if (isset($_POST['addQuestion'])) {
    // Increment the question count
    $newQuestionNo = $quiz_row['questions'] + 1;
    echo '
        <div class="quiz-question" id="question' . $newQuestionNo . '">
            <div class="question-container">
                <h3>Question ' . $newQuestionNo . '</h3>
                <div class="col-md-23">
                    <label for="q' . $newQuestionNo . '_qn">Question</label>
                    <input type="text" name="q' . $newQuestionNo . '_qn" placeholder=" Question ' . $newQuestionNo . '" class="form-control mb-3" required>
                </div>
                <div class="col-md-23">
                    <label for="q' . $newQuestionNo . '_op1">Option 1</label>
                    <input type="text" name="q' . $newQuestionNo . '_op1" placeholder=" Option 1" class="form-control mb-3" required>
                </div>
                <div class="col-md-23">
                    <label for="q' . $newQuestionNo . '_op2">Option 2</label>
                    <input type="text" name="q' . $newQuestionNo . '_op2" placeholder=" Option 2" class="form-control mb-3" required>
                </div>
                <div class="col-md-23">
                    <label for="q' . $newQuestionNo . '_op3">Option 3</label>
                    <input type="text" name="q' . $newQuestionNo . '_op3" placeholder=" Option 3" class="form-control mb-3" required>
                </div>
                <div class="col-md-23">
                    <label for="q' . $newQuestionNo . '_op4">Option 4</label>
                    <input type="text" name="q' . $newQuestionNo . '_op4" placeholder=" Option 4" class="form-control mb-3" required>
                </div>
                <div class="col-md-23">
                    <label for="q' . $newQuestionNo . '_answer">Correct Answer</label>
                    <select name="q' . $newQuestionNo . '_answer" class="form-control" required>
                        <option value="option_1">Option 1</option>
                        <option value="option_2">Option 2</option>
                        <option value="option_3">Option 3</option>
                        <option value="option_4">Option 4</option>
                    </select>
                </div>
            </div>
        </div>
    ';
}

// Check if the "Remove Last Question" button is clicked
if (isset($_POST['removeQuestion'])) {
    // Decrement the question count
    $newQuestionNo = max(1, $quiz_row['questions'] - 1);
    echo '<script>removeQuestion(' . $newQuestionNo . ');</script>';
}
?>
