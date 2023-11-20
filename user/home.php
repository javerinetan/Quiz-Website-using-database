<?php 
require_once('../connection.php');
session_start();
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 

$query="select * from account where id=".$_SESSION['User']."";
$instance = new DatabaseConnection();
$row=$instance->retrieveData($query);

$quizQuery = "SELECT * FROM quiz";
$quizResults = $instance->retrieveData($quizQuery);

function getRandomImagePath() {
    $imagePool = [
        'images/image1.jpg',
        'images/image2.jpeg',
        'images/image3.jpeg',
        // Add more image paths as needed
    ];

    $randomIndex = array_rand($imagePool);
    return $imagePool[$randomIndex];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    <?php
        // $query = "SELECT name FROM account WHERE id=" . $_SESSION['User'] . "";
        // $result = mysqli_query($con, $query);
        // $row = $result->fetch_assoc();
        echo 'Welcome ' . ucfirst($row['name']);
    ?>

    </title>

    <!-- bootstraps -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="userstyle.css">
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

    <style>
        #container-central{
         width: 70%;
         height: 30%;   
         margin-left: auto;
         margin-right: auto;
        }
    </style>

</head>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Logo and Search Bar on the left -->
        <img class="navbar-brand" src="../wf/assets/QuizITLogoname.png" href="user_dashboard.php">

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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
                </li>
            </ul>
        </div>

        <!-- Profile button and dropdown on the left -->
        <div class="dropdown">
        <a href="../quiz/create_quiz.php"><button class="btn create " type="submit" href="create_quiz.php">Create a Quiz</button></a>

            <!-- Profile dropdown with image -->
            <button class="btn profile dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../wf/assets/dd.jpg" alt="User Image" class="user-image">
            </button>
            <ul class="profile_drop dropdown-menu" aria-labelledby="profileDropdown">
                <li class="details_user">
                <?php  
                if(isset($_SESSION['User']))
                    {
                        $query="select * from account where id=".$_SESSION['User']."";
                        $results=mysqli_query($con,$query);
                        $row=$results->fetch_assoc();
                        echo $row['name'];
                        echo '<br>';
                        echo $row['email'];
                    }
                else
                    {
                        header("location:login.php");
                    }
                ?>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="user_account.php">Settings</a></li>
                <li><a class="dropdown-item" href="../account/logout.php?logout">Log Out</a>
                
                </li>
            </ul>
        </div>
    </div>
</nav>


<body>
    
<!-- Create a carousel to show quiz -->
<div id="container-central">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="https://via.placeholder.com/800x400.png" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
        <img src="https://via.placeholder.com/800x400.png" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
        <img src="https://via.placeholder.com/800x400.png" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>


<div class="modal fade" id="quizDetailsModal" tabindex="-1" aria-labelledby="quizDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="quizDetailsModalLabel">Quiz Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img id="quizImage" src="" alt="Quiz Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h4 id="quizName"></h4>
            <p id="numQuestions"></p>
            <a id="startQuizBtn" class="btn btn-primary">Start Quiz</a>
            <a class="btn btn-secondary">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="container-central" onclick="openQuizDetailsModal">
    <h2>Your Quizzes</h2>
    <?php 
    // Fetch quizzes from the quiz table
    $quizQuery = "SELECT * FROM quiz WHERE creator_id=" . $_SESSION['User'];
    $quizResult = $con->query($quizQuery);

    // Check if there are quizzes
    if ($quizResult && $quizResult->num_rows > 0) {
        echo '<div class="quizzes-container">';
        while ($quizRow = $quizResult->fetch_assoc()) {
            // Display each quiz
            echo '<div class="quiz-container" onclick="openQuizDetailsModal(' . $quizRow['quiz_id'] . ', \'' . $quizRow['quiz_name'] . '\', \'' . $quizRow['questions'] . '\')">';

            $randomImagePath = getRandomImagePath();
            echo '<img src="' . $randomImagePath . '" alt="Quiz Image">';
            echo '<p>' . $quizRow['quiz_name'] . '</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No quizzes found.</p>';
    }
    ?>

    
</div>

</body>

<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>

<script>
  function openQuizDetailsModal(quizId, quizName, numQuestions, imagePath) {
    // Set the modal content dynamically
    var quizImage = document.getElementById('quizImage');
    var quizNameElement = document.getElementById('quizName');
    var numQuestionsElement = document.getElementById('numQuestions');
    var startQuizBtn = document.getElementById('startQuizBtn');

    // Update the image source
    quizImage.src = imagePath;

    // Update other modal content
    quizNameElement.innerText = quizName;
    numQuestionsElement.innerText = "Number of Questions: " + numQuestions;

    // Set the href attribute for the "Start Quiz" button
    startQuizBtn.href = '../quiz/quiz.php?quiz_id=' + quizId;

    // Show the modal
    $('#quizDetailsModal').modal('show');
  }
</script>


</footer>

</html>