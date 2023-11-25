<?php 
require_once('../connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:account/login.php");}
?>

<?php 
    if(isset($_POST['change']))
    {  
        if(empty($_POST['c_name']) && empty($_POST['c_email']) && empty($_POST['c_bd']) && empty($_POST['c_password']))
        {
            header("location:edit.php?Empty= Please Fill in the Blanks");
        }elseif(!empty($_POST['c_name'])){
            $sql = "UPDATE account SET name = '" . strtolower($_POST['c_name']) . "' WHERE id=". $_SESSION['User']."";
            $insertresults = mysqli_query($con,$sql);
            header("location:user_account.php?EditSuccess=Name");
        }elseif(!empty($_POST['c_email'])){
            $query="select * from account where email='". $_POST['c_email']."'";
            $result=mysqli_query($con,$query);
            if ($result){
                header('location:edit.php?email&Invalid=Email has been registered before! Choose another email');
            }else{
                $sql = "UPDATE account SET email = '" . strtolower($_POST['c_email']) . "' WHERE id=". $_SESSION['User']."";
                $insertresults = mysqli_query($con,$sql);
                // session_destroy();
                // session_start();
                // $_SESSION['User']=strtolower($_POST['c_email']);
                header("location:user_account.php?EditSuccess=Email");
            }
        }elseif(!empty($_POST['c_bd'])){
            $sql = "UPDATE account SET birthdate = '" . $_POST['c_bd'] . "' WHERE id=". $_SESSION['User']."";
            $insertresults = mysqli_query($con,$sql);
            header("location:user_account.php?EditSuccess=Birthdate");
        }elseif(!empty($_POST['c_password'])){
            $sql = "UPDATE account SET password = '" . $_POST['c_password'] . "' WHERE id=".$_SESSION['User']."";
            $insertresults = mysqli_query($con,$sql);
            header("location:user_account.php?EditSuccess=Password");
        }else{
            header('location:user_account.php');
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Change
        <?php 
            if(isset($_GET['name'])){
                echo 'Name';
            }elseif(isset($_GET['email'])){
                echo 'Email';
            }elseif(isset($_GET['birthdate'])){
                echo 'Birth Date';
            }elseif(isset($_GET['password'])){
                echo 'Password';
            }else{
                // header('location:user_account.php');
            }
        ?>
    </title>
    
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
    
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-dark mt-5">
                    <div class="card-title bg-primary text-white mt-5">
                        <h3 class="text-center py-3">Login Form in PHP </h3>
                    </div>
                    <div class="card-body">
                        <form action="process.php" method="post">
                            <input type="text" name="UName" placeholder=" User Name" class="form-control mb-3">
                            <input type="password" name="Password" placeholder=" Password" class="form-control mb-3">
                            <button class="btn btn-success mt-3" name="Login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <main class="container_login">
        <div class="header">
            <h1 class="display-4">Change 
                <?php 
                    if(isset($_GET['name'])){
                        echo 'Name';
                    }elseif(isset($_GET['email'])){
                        echo 'Email';
                    }elseif(isset($_GET['birthdate'])){
                        echo 'Birth Date';
                    }elseif(isset($_GET['password'])){
                        echo 'Password';
                    }else{
                        // header('location:user_account.php');
                    }
                ?>
            </h1>
        </div>
        <div class="login-form">
            <form method="post" class="row g-2">
                <?php 
                    if(isset($_GET['name'])){
                        echo 
                        '<div class="col-md-23" >
                            <input type="text" name="c_name" placeholder=" Change Name" class="form-control mb-3" required>
                        </div> ';
                    }elseif(isset($_GET['email'])){
                        echo 
                        '<div class="col-md-23" >
                            <input type="email" name="c_email" placeholder=" Change Email" class="form-control mb-3" required>
                        </div> ';
                    }elseif(isset($_GET['birthdate'])){
                        echo 
                        '<div class="col-md-23" >
                            <input type="date" name="c_bd" placeholder=" Change Birth Date" class="form-control mb-3" required>
                        </div> ';
                    }elseif(isset($_GET['password'])){
                        echo 
                        '<div class="col-md-23" >
                            <input type="password" name="c_password" placeholder=" Change Password" class="form-control mb-3" required>
                        </div> ';
                    }else{
                        header('location:user_account.php');
                    }
                ?>
            

                <button class="btn btn-success mt-3" name="change">Change</button>
                <!-- class="btn btn-primary text-center mb-4" -->
            </form>
        </div>
    </main>
    <div class="home-button">
        <a href="../index.php">Go to Homepage <span>&rarr;</span></a>
    </div>

</body>
<footer>
<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>

</footer>
</html>

<?php 
    if(@$_GET['Empty']==true)
    {
?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
<?php
    }
?>


<?php 
    if(@$_GET['Invalid']==true)
    {
?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
<?php
    }
?>

<?php 
    if(@$_GET['Success']==true)
    {
?>
    <div class="alert-light text-success text-center py-3"><?php echo $_GET['Success'] ?></div>                                
<?php
    }
?>