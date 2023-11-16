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
       if(empty($_POST['q_name']) || empty($_POST['q_no']))
       {
            header("location:create_quiz.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select id from account where id='".$_SESSION['User']."'";
            $instance = new DatabaseConnection();
            $row=$instance->retrieveData($query);
            $creator_id = $row['id'];

            $sql = "INSERT INTO quiz VALUES (NULL,'".$creator_id."', '".strtolower($_POST['q_name'])."', '".$_POST['q_no']."', NULL)";
            // $insertresults = mysqli_query($con,$sql);
            if (mysqli_query($con,$sql)) {
                // header("location:signup.php?Success= New account created! Please go to <a href='login.php'>Login Page</a> ");
                $query2="select quiz_id from quiz where quiz_name='".strtolower($_POST['q_name'])."'";
                $row2=$instance->retrieveData($query2);
                
                $instance->createQuizTable($row2['quiz_id']);
                // $table_query="CREATE TABLE quiz_".$row2['quiz_id']."(
                //     quiz_no INT PRIMARY KEY AUTO_INCREMENT, 
                //     question VARCHAR(255) NOT NULL, 
                //     option_1 VARCHAR(255) NOT NULL, 
                //     option_2 VARCHAR(255) NOT NULL, 
                //     option_3 VARCHAR(255) NOT NULL, 
                //     option_4 VARCHAR(255) NOT NULL, 
                //     answer VARCHAR(255) NOT NULL
                // )";
                // mysqli_query($con, $table_query);
                
                header("location:edit_quiz.php?quiz_id=".$row2['quiz_id']);
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Create Quiz</title>

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
            <h1 class="display-4">Create Quiz</h1>
        </div>
        <div class="form">
            <form method="post" class="row g-2">
                <div class="col-md-23" >
                    <input type="text" name="q_name" placeholder=" Quiz Name" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="number" name="q_no" placeholder=" Number of Questions" class="form-control mb-3">
                </div>

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