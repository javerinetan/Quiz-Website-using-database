<!-- for log in only function -->
<?php 
require_once('../connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 

?>

<?php 
    if(isset($_POST['c_quiz']) || isset($_POST['c_qn'])){
        if(isset($_POST['c_quiz'])){
            if(empty($_POST['q_name']) || empty($_POST['q_no']))
            {
                header("location:create_quiz.php?Empty= Please Fill in the Blanks");
            }
            else
            {   
                $query="select * from quiz where quiz_name='". $_POST['q_name']."'";
                $result=mysqli_query($con,$query);
                $rowCount = mysqli_num_rows($result);
                if($rowCount>0){
                    header('location:create_quiz.php?Invalid= This quiz name has been taken choose something else!</a>');
                }else{
                    $q_name=$_POST['q_name'];
                    $q_no=$_POST['q_no'];
                }       
            }
        }

        if (isset($_POST['c_qn'])){
            $q_name=$_POST['q_name'];
            $q_no=intval($_POST['q_no']);
            $creator_id = $_SESSION['User'];

            //create row in quiz table
            $sql = "INSERT INTO quiz VALUES (NULL,'".$creator_id."', '".strtolower($q_name)."', '".$q_no."', NULL)";
            $insertresults = mysqli_query($con,$sql);
            // if (mysqli_query($con,$sql)) {
            
            // create specific quiz question table
            $query2="select quiz_id from quiz where quiz_name='".strtolower($q_name)."'";
            $instance = new DatabaseConnection();
            $row2=$instance->retrieveData($query2);
            $quiz_no=$row2['quiz_id'];
            $instance->createQuizTable($row2['quiz_id']);
            // }
            
            // start adding questions into the specific quiz question table
            $table_name = "quiz_". $quiz_no ;
            $question_no = 1;
            $limit = $q_no;
            // LOOP TILL END OF DATA
            while($question_no <= $limit)
            {
                $qn = $_POST["q{$question_no}_qn"];
                $op1 = $_POST["q{$question_no}_op1"];
                $op2 = $_POST["q{$question_no}_op2"];
                $op3 = $_POST["q{$question_no}_op3"];
                $op4 = $_POST["q{$question_no}_op4"];
                $correct = $_POST["q{$question_no}_answer"];
                if($correct=="option_1"){
                    $correct=$op1;
                }elseif($correct=="option_2"){
                    $correct=$op2;
                }elseif($correct=="option_3"){
                    $correct=$op3;
                }elseif($correct=="option_4"){
                    $correct=$op4;
                }
                $qn_query = "insert into ".$table_name." values (NULL, '".$qn."', '".$op1."', '".$op2."', '".$op3."', '".$op4."', '".$correct."')";
                $results=mysqli_query($con,$qn_query);
                // checking
                // if (mysqli_query($con,$qn_query) === TRUE) {
                //     echo '1';
                // } else {
                //     echo "Error: " . $qn_query . "<br>" . $con->error;
                // }
                $question_no ++;
            }
            header("location:view_quiz.php?quiz_id=".$quiz_no);
        }
    }else{
        header("location:create_quiz.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../wf/style.css" rel="stylesheet" type="text/css" />
    <link href="quiz_style.css" rel="stylesheet" type ="text/css" />

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
            <h1 class="display-4 Quiz_name">Edit 
            <?php 
            echo $q_name;
            ?> 
            Quiz</h1>
        </div>

        <div class="sidebar">
            <h2>Questions</h2>
            <ul>
                <?php
                    for ($question_no = 1; $question_no <= $q_no; $question_no++) {
                        echo '<li><a href="#question'.$question_no.'">Question '.$question_no.'</a></li>';
                    }
                ?>
            </ul>
        </div>

        <div class="main-content">
            <form method="post" class="row g-2" id="quiz-form">
                <?php
                    echo '
                    <input type="hidden" id="q_name" name="q_name" value="'.$q_name.'">
                    <input type="hidden" id="q_no" name="q_no" value="'.$q_no.'">
                    ';
                ?>
                <?php
                $question_no = 1;
                $limit = $q_no;
                while ($question_no <= $limit) {
                    echo '
                    <div class="quiz-question" id="question'.$question_no.'">
                        <div class="question-container">
                            <h3>Question '.$question_no.'</h3>
                            <div class="col-md-23" >
                                <label for="q'.$question_no.'_qn">Question</label>
                                <input type="text" name="q'.$question_no.'_qn" placeholder=" Question '.$question_no.'" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23" >
                                <label for="q'.$question_no.'_op1">Option 1</label>
                                <input type="text" name="q'.$question_no.'_op1" placeholder=" Option 1" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23">
                                <label for="q'.$question_no.'_op2">Option 2</label>
                                <input type="text" name="q'.$question_no.'_op2" placeholder=" Option 2" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23" >
                                <label for="q'.$question_no.'_op3">Option 3</label>
                                <input type="text" name="q'.$question_no.'_op3" placeholder=" Option 3" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23" >
                                <label for="q'.$question_no.'_op4">Option 4</label>
                                <input type="text" name="q'.$question_no.'_op4" placeholder=" Option 4" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-23">
                                <label for="q'.$question_no.'_answer">Correct Answer</label>
                                <select name="q'.$question_no.'_answer" class="form-control" required>
                                    <option value="option_1">Option 1</option>
                                    <option value="option_2">Option 2</option>
                                    <option value="option_3">Option 3</option>
                                    <option value="option_4">Option 4</option>
                                </select>
                            </div>
                        </div>
                    ';
                    if($question_no < $limit){
                        echo '<a class="btn btn-success mt-3 text-white" name="c_next" id="'.$question_no.'">Next</a> </div>';
                    }else{
                        echo '<button class="btn btn-success mt-3" name="c_qn" onclick="submitForm()">Submit</button> </div>';
                    }
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