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
        $limit = $quiz_row['questions'];

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
        shuffle($questions);

if (isset($_POST['s_qn'])) {
    $quiz_id = $_POST['quiz_id'];
    $question_order = $_POST['question_id'];
    $quiz_count = count($question_order);

    // print_r($_POST);
    $wrong = 0;
    $correct = 0;
    $order = 1;
    // print_r($user_answers);

    foreach($question_order as $question){
        $quiz_query = "SELECT * FROM quiz_$quiz_id WHERE quiz_no=$question";
        $quiz_result = mysqli_query($con, $quiz_query);
        $quiz_row = mysqli_fetch_assoc($quiz_result);    
        $answer = $quiz_row['answer'];
        $given_input = 'answer'.$order;
        if($answer === $_POST[$given_input]){
            $correct++;
        }else{
            $wrong++;
        }
        $order++;
    }

    $total_questions = $quiz_count;
    $percentage = ($correct / $total_questions) * 100;

    $sql = "INSERT INTO quiz_attempt_log VALUES (NULL,'".$_SESSION['User']."',".$quiz_id.", ".$wrong.", ".$correct.", ".$percentage.", NULL)";
    $insertresults = mysqli_query($con,$sql);
    if ($insertresults) {
        $sql100="SELECT * FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY attempt_id DESC) AS rn FROM quiz_attempt_log ) AS subquery WHERE rn = 1;";
        $quiz_result100 = mysqli_query($con,$sql100);
        $quiz_row100 = mysqli_fetch_assoc($quiz_result100);    
        $attempt_id = $quiz_row100['attempt_id'];
        header("location:results.php?attempt_id=".$attempt_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $quiz_name; ?> Quiz</title>

    <!-- bootstraps -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="quiz_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

    <link href="../wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../wf/assets/QuizITLogo.png" rel="apple-touch-icon" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">



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
                $question_no1 = 1;

                foreach ($questions as &$question) {
                    // echo '<div class="question-box"><a href="#question' . $question['question'] . '">' . $question['quiz_no'] . '</a></div>';
                    echo '<div class="question-box a_quiz"><a href="#q' . $question_no1 . '" id="'.$question['quiz_no'].'">' .$question_no1. '</a></div>';
                
                    $question_no1++;

                }
            ?>
        </div>
    </div>

    <!-- <div class="main-content">
        <?php
        foreach ($questions as &$question) {
            echo '
            <div class="quiz-question">
                <div class="question-container" id="question' . $question['question'] . '">
                    <h3>Question ' . $question['quiz_no'] . '</h3>
                    <p>' . $question['question'] . '</p>
                    <form method="post" action="process_quiz.php">
                        <input type="hidden" name="question_id" value="' . $question['question'] . '">
                        <input type="hidden" name="quiz_id" value="' . $quiz_id . '">
                        <ul style="list-style-type: none; padding: 0;">';
            foreach ($question['options'] as $option) {
                echo '
                        <li>
                            <label>
                                <input type="radio" name="answer" value="' . $option . '" required>
                                ' . $option . '
                            </label>
                        </li>';
            }
            echo '
                        </ul>
                        
                    </div>
                </form>

            </div>';
        
        }
        ?>
    </div>  -->
    <div class="main-content">
        <form method="post">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
        <?php 
        $question_no = 1;
        foreach ($questions as &$question): ?>
            <div class="quiz-question">
                <div class="question-container" id="question<?php echo $question['question']; ?> q<?php echo $question_no;?>">
                    <h3>Question <?php echo $question_no; ?></h3>
                    <p><?php echo $question['question']; ?></p>
                    
                        <input type="hidden" name="question_id[]" value="<?php echo $question['quiz_no']; ?>">
                        <ul style="list-style-type: none; padding: 0;">
                            <?php foreach ($question['options'] as $option): ?>
                                <li>
                                    <label>
                                        <input type="radio" name="answer<?php echo $question_no?>" value="<?php echo $option; ?>" required>
                                        <?php echo $option; ?>
                                    </label>
                                </li>
                                
                            <?php endforeach; ?>
                        </ul>
                    
                </div>
            
            <?php
            $next = $question_no + 1;
            $back = $question_no - 1;
            // $instance = new DatabaseConnection();
            // $query_next="select * from quiz where id=".$_SESSION['User']."";
            // $query_back="select * from account where id=".$_SESSION['User']."";
            if ($question_no < $limit) {
                if ($back >= 1) {
                    // $row=$instance->retrieveData($query);
                    echo '<a class="btn attempt-btn mt-3 mr-2 text-white" id="' . $back . '" href="#q' . $back . '">Back</a>';
                    echo '<a class="btn attempt-btn mt-3 text-white" class="attempt-btn" id="' . $next . '" href="#q' . $next . '">Next</a></div>';
                } 
                else {
                    echo '<a class="btn attempt-btn mt-3 text-white" class="attempt-btn" id="' . $next . '" href="#q' . $next . '">Next</a></div>';
                }
            
            } 
            else if ($question_no == 1 ){
                echo '<button class="btn mt-3 attempt-btn" name="s_qn" onclick="submitForm()">Submit Quiz</button></div>';
            }
            else {
                echo '<a class="btn mt-3 attempt-btn mr-2 text-white"id="' . $back . '" href="#q' . $back . '">Back</a>';
                echo '<button class="btn mt-3 attempt-btn" name="s_qn" onclick="submitForm()">Submit Quiz</button></div>';
            }
            // $question_no['quiz_no']++;
            $question_no++;
            ?>
        <?php endforeach; ?>
        </form>
        </div>
    </div>
    <div class="home-btn-container">
        <a href="../user/home.php" class="home-btn"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
    </div>
</main>

    <?php
    } else {
        echo "Quiz not found!";
    }
    } else {
    echo "Quiz ID not provided!";
    }
    ?>
</body>

<footer>


<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
<script src='quiz.js'></script>
</footer>

</html>