<head>
    <!-- bootstraps -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../user/userstyle.css">
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

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Logo and Search Bar on the left -->
        <img class="navbar-brand" src="../wf/assets/QuizITLogoname.png" href="home.php">

        <!-- Toggler Button for small screens -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <form class="d-flex">
            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        </form>

        <!-- Navbar items at the center -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../user/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../user/activity.php">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
                </li>
                <?php
                    $navbar_query="select * from account where id=".$_SESSION['User']."";
                    $navbar_instance = new DatabaseConnection();
                    $navbar_row=$navbar_instance->retrieveData($navbar_query);
                    if($navbar_row['admin']){
                        echo '<li class="nav-item">
                                <a class="nav-link" href="../admin/retrieve_users.php" tabindex="-1" aria-disabled="true">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../admin/retrieve_quiz.php" tabindex="-1" aria-disabled="true">Quiz</a>
                            </li>';
                    }
                ?>
            </ul>
        </div>

        <!-- Profile button and dropdown on the left -->
        <div class="dropdown">
        <a href="../quiz/create_quiz.php"><button class="btn create " type="submit">Create a Quiz</button></a>

            <!-- Profile dropdown with image -->
            <button class="btn profile dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../wf/assets/dd.jpg" alt="User Image" class="user-image">
            </button>
            <ul class="profile_drop dropdown-menu" aria-labelledby="profileDropdown">
                <li class="details_user">
                <?php  
                    $nav_query="select * from account where id=".$_SESSION['User']."";
                    $nav_results=mysqli_query($con,$nav_query);
                    $nav_row=$nav_results->fetch_assoc();
                    echo $nav_row['name'];
                    echo '<br>';
                    echo $nav_row['email'];
                ?>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../user/user_account.php">Settings</a></li>
                <li><a class="dropdown-item" href="../account/logout.php?logout">Log Out</a>
                <?php 
                    // $query="select * from account where email='".$_SESSION['User']."'";
                    // $results=mysqli_query($con,$query);
                    // $row=$results->fetch_assoc();
                    // echo '<a class="dropdown-item" href="../account/logout.php?logout">Log Out</a>';
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


