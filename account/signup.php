<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Login Form in PHP With Session</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

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

    <main class="container ">
        <div class="header">
            <h1 class="display-4">Sign Up</h1>
        </div>
        <div class="signup-form">
            <form action="process_signup.php" method="post" class="row g-2">
                <div class="col-md-23" >
                    <input type="text" name="Name" placeholder=" Name" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="date" name="Birthdate" placeholder=" Birthdate" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="email" name="Email" placeholder=" Email" class="form-control mb-3">
                </div>
                <div class="col-md-23" >
                    <input type="password" name="Password" placeholder=" Password" class="form-control mb-3">
                </div>
                <button class="btn btn-success mt-3" name="Signup">Sign up</button>
                <!-- class="btn btn-primary text-center mb-4" -->
            </form>
        </div>
    </main>

</body>
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