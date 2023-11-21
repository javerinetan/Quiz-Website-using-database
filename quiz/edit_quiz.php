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
        $quiz_limit = $quiz_row['questions'];

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
    <link rel="stylesheet" href="quiz_style.css" />

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
            <div class="question-boxes">
                <?php
                // Loop through existing questions and generate list items
                for ($i = 1; $i <= $quiz_row['questions']; $i++) {
                    echo '<div class="question-box" id="box'.$i.'"><a href="#question'  . $i . '" id="sideqn'.$i.'">' . $i . '</a></div>';
                }
                ?>

            </div>

            <!-- Add Question Button -->
            <form method="post" action="" id="addQuestionForm">
                <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                <button type="button" onclick="addQuestion()">Add Question</button>
            </form>

            <!-- Remove Question Button -->
            <form method="post" action="" id="removeQuestionForm">
                <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                <button type="button" onclick="confirmDelete()">Remove Question</button>
            </form>
        </div>

        <div class="main-content">
            <form method="post" class="row g-2" id="quiz-form">
                <?php
                $question_no = 1;
                foreach ($questions as &$question) {
                    echo '
                    <div class="quiz-question" id="question' . $question_no . '">
                    
                        <div class="question-container">';
                        echo "question" . $question_no;
                        echo'
                            <h3>Question ' . $question_no . '</h3>
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
            <div class="col-md-12 text-center mt-3">
                <button type="button" class="btn btn-success mr-auto" id="backButton" onclick="navigateQuestion('back')" style="display: none;">Back</button>
                <button type="button" class="btn btn-success ml-auto" id="nextButton" onclick="navigateQuestion('next')" >Next</button>
                <button type="submit" class="btn btn-successn ml-auto" name="c_qn" id="submitButton" style="display: none;">Submit</button>
            </div>
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
    $quiz_limit++;
    $newQuestionNo = $quiz_limit;
    echo $quiz_limit;
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

<script>
    var questionCount = <?php echo $quiz_row['questions'] ?>;
    function addQuestion() {
        // Increment the question count
        questionCount++;
        // Create a new question container
        var newQuestionContainer = `
            <div class="quiz-question" id="question${questionCount}">
                <div class="question-container">
                    <h3>Question ${questionCount}</h3>
                    <div class="col-md-23">
                        <label for="q${questionCount}_qn">Question</label>
                        <input type="text" name="q${questionCount}_qn" placeholder=" Question ${questionCount}" class="form-control mb-3" required>
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
        `;

        // Append the new question container to the main content
        document.getElementById('quiz-form').insertAdjacentHTML('beforeend', newQuestionContainer);

        // Increment the question count in the sidebar
        var questionBoxes = document.querySelector('.question-boxes');
        var newQuestionBox = document.createElement('div');
        newQuestionBox.className = 'question-box';
        newQuestionBox.id = `box${questionCount}`;
        newQuestionBox.innerHTML = `<a href="#question${questionCount}" id="questionbar" onclick="showQuestion(${questionCount})"> ${questionCount}</a>`;
        questionBoxes.appendChild(newQuestionBox);
        // Show the newly added question
        showQuestion(questionCount);
    }

    function showQuestion(questionNo) {
        // Hide all question containers
        var questionContainers = document.querySelectorAll('.quiz-question');
        questionContainers.forEach(function (container) {
            container.style.display = 'none';
        });

        // Show the selected question container
        var selectedContainer = document.getElementById(`question${questionNo}`);
        if (selectedContainer) {
            selectedContainer.style.display = 'block';
        }
    }

    function confirmDelete() {
        // Prompt user to enter the question number to delete
        var questionNoToDelete = prompt("Enter the question number to delete:");

        // Validate input and delete question
        if (questionNoToDelete !== null && !isNaN(questionNoToDelete)) {
            questionNoToDelete = parseInt(questionNoToDelete);
            deleteQuestion(questionNoToDelete);
        }
    }



    function deleteQuestion(questionNo) {
        // Ensure questionNo is valid
        if (questionNo < 1 || questionNo > questionCount) {
            alert("Invalid question number. No question deleted.");
            return;
        }
        // alert(`question${questionNo}`)
        // Remove the question container from the main content
        var questionContainerToRemove = document.getElementById(`question${questionNo}`);
        questionContainerToRemove.parentNode.removeChild(questionContainerToRemove);

        // Update quiz_no for remaining questions
        // var questionContainers = document.querySelectorAll('.quiz-question');
        // questionContainers.forEach(function (container, index) {
        //     var currentQuestionNo = index + 1;
        //     container.id = `question${currentQuestionNo}`;
        //     container.querySelector('h3').innerText = `Question ${currentQuestionNo}`;

        //     // Update quiz_no for input fields
        //     container.querySelectorAll('input, select').forEach(function (input) {
        //         var oldName = input.name;
        //         input.name = oldName.replace(/\d+/, currentQuestionNo);
        //         input.placeholder = input.placeholder.replace(/\d+/, currentQuestionNo);
        //     });

        // });

        // Update the question count only if the question number is the last one
        if(questionNo === questionCount){
            questionCount--;
        }
        var questionbar = document.getElementById(`box${questionNo}`);
        questionbar.remove();
        // updateQuestionList();

        // Show the previous question (if any)
        if (questionCount > 0) {
            showQuestion(Math.min(questionNo, questionCount));
        }
    }

    function updateQuestionList() {
        var questionList = document.getElementById('questionList');
        questionList.innerHTML = '';

        for (var i = 1; i <= questionCount; i++) {
            var listItem = document.createElement('li');
            listItem.innerHTML = `<a href="#question${i}" onclick="showQuestion(${i})">Question ${i}</a>`;
            questionList.appendChild(listItem);
        }
    }

    function updateButtonVisibility(currentQuestion) {
        var backButton = document.getElementById('backButton');
        var nextButton = document.getElementById('nextButton');
        var submitButton = document.getElementById('submitButton');

        backButton.style.display = currentQuestion > 1 ? 'block' : 'none';

        if (currentQuestion < questionCount) {
            nextButton.style.display = 'block';
            submitButton.style.display = 'none';
        } else {
            nextButton.style.display = 'none';
            submitButton.style.display = 'block';
        }
    }

    function navigateQuestion(direction) {
        var currentQuestion = getCurrentQuestion();
        var newQuestionNo;

        if (direction === 'next') {
            newQuestionNo = Math.min(currentQuestion + 1, questionCount);
        } else if (direction === 'back') {
            newQuestionNo = Math.max(currentQuestion - 1, 1);
        }

        showQuestion(newQuestionNo);
        updateButtonVisibility(newQuestionNo);
    }

    function getCurrentQuestion() {
        var visibleQuestion = document.querySelector('.quiz-question[style="display: block;"]');
        var questionNo = parseInt(visibleQuestion.id.replace('question', ''));
        return isNaN(questionNo) ? 1 : questionNo;
    }

    // Initial visibility update
    updateButtonVisibility(1);
</script>