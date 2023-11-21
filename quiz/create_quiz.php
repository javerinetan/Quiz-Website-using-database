<!-- for log in only function -->
<?php 
require_once('../connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Quiz</title>
</head>

<style>
    h1{
    color: #5d2057 !important;
    margin-top: 30px !important;
    margin-bottom: 10px !important ;
    font-family: Quicksand, sans-serif !important;
    }
    .container_quiz{
        text-align: center;
        width: 50%; 
        margin: 20px auto; 
        padding-top: 50px;
    }

    @media screen and (max-width: 768px) {
        .container_quiz{
            width: 80%; 
            margin: 10px auto;
            padding-top: 40px;
        }
    }

</style>

<?php require '../navbar.php'?>

<body>
    <main class="container_quiz">
        <div class="">
            <h1 class="display-4">Create Quiz</h1>
        </div>
        <div class="form">
            <form method="post" class="row g-2" action='create_questions.php'>
                <div class="col-md-23" >
                    <input type="text" name="q_name" placeholder=" Quiz Name" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="number" name="q_no" placeholder=" Number of Questions" min=1 class="form-control mb-3">
                </div>

                <button class="btn create" name="c_quiz">Create Quiz</button>
                <!-- class="btn btn-primary text-center mb-4" -->
            </form>
        </div>
    </main>

    
<?php 
    if(@$_GET['Invalid']==true)
    {
?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
<?php
    }
?>

<?php 
    if(@$_GET['Empty']==true)
    {
?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
<?php
    }
?>
</body>

<footer>

<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>