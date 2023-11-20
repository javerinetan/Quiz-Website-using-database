<!-- for log in only function -->
<?php 
require_once('../connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 

?>

<?php 
    if(isset($_POST['c_quiz']))
    {
    //    if(empty($_POST['q_name']) || empty($_POST['q_no']))
    //    {
    //         header("location:forgot-password.php?Empty= Please Fill in the Blanks");
    //    }
    //    else
    //    {
    //         $query="select id from account where email='".$_SESSION['User']."'";
    //         $instance = new DatabaseConnection();
    //         $row=$instance->retrieveData($query);
    //         $creator_id = $row['id'];

    //         $sql = "INSERT INTO quiz VALUES (NULL,'".$creator_id."', '".strtolower($_POST['q_name'])."', '".$_POST['q_no']."', NULL)";
    //         $insertresults = mysqli_query($con,$sql);
    //         if (mysqli_query($con,$sql) === TRUE) {
    //             // header("location:signup.php?Success= New account created! Please go to <a href='login.php'>Login Page</a> ");
    //             $query="select quiz_id where quiz_name='".strtolower($_POST['q_name'])."'";
    //             $insertresults = mysqli_query($con,$sql);

    //             header("location:edit_quiz.php?quiz_id=".$insertresults);
    //         } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //         }
            
    //    }
    $quiz_no=$_GET['quiz_id'];

    $table_name = "quiz_". $quiz_no ;
    $question_no = 1;
    $query="select * from quiz where quiz_id='".$_GET['quiz_id']."'";
    $instance = new DatabaseConnection();
    $row=$instance->retrieveData($query);
    $limit = $row['questions'];
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
        // if (mysqli_query($con,$qn_query) === TRUE) {
        //     echo '1';
        // } else {
        //     echo "Error: " . $qn_query . "<br>" . $con->error;
        // }
        $question_no ++;
    }
    header("location:retrieve_quiz.php?quiz_id=".$_GET['quiz_id']);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

    <link href="../wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../wf/assets/QuizITLogo.png" rel="apple-touch-icon" />


</head>

<body>
    <main class="container">
        <div class="header">
            <h1 class="display-4">Edit 
            <?php 
            $query="select * from quiz where quiz_id='".$_GET['quiz_id']."'";
            $instance = new DatabaseConnection();
            $row=$instance->retrieveData($query);
            echo "".$row['quiz_name']."";
            ?> 
            Quiz</h1>
        </div>
        
        <div class="form">
            <form method="post" class="row g-2">
            <?php 
                $question_no = 1;
                // $query="SELECT * FROM quiz WHERE quiz_id='".$_GET['quiz_id']."'";
                // $instance = new DatabaseConnection();
                // $row=$instance->retrieveData($query);
                $limit = $row['questions'];
                // LOOP TILL END OF DATA
                while($question_no <= $limit)
                {
                    echo '
                    <div style="border-style: solid;">
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
                    <div class="col-md-23" >
                        
                        <p>What is the correct option</p>
                        <input type="radio" name="q'.$question_no.'_answer" id="option_1" value="option_1" required>
                        <label for="option_1">Option 1</label>
                        <br>
                        <input type="radio" name="q'.$question_no.'_answer" id="option_2" value="option_2" required>
                        <label for="option_2">Option 2</label>
                        <br>
                        <input type="radio" name="q'.$question_no.'_answer" id="option_3" value="option_3" required>
                        <label for="option_3">Option 3</label>
                        <br>
                        <input type="radio" name="q'.$question_no.'_answer" id="option_4" value="option_4" required>
                        <label for="option_4">Option 4</label>


                        
                    </div>
                    </div>
                ';
                $question_no++;  
            
                }
            ?>
                
                <button class="btn btn-success mt-3" name="c_quiz">Create Quiz</button>
                <!-- class="btn btn-primary text-center mb-4" -->
            </form>
        </div>
    </main>

</body>

<footer>


<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>