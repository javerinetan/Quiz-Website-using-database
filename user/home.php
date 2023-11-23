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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <style>
        #container-central{
         width: 70%;
         height: 30%;   
         margin-left: auto;
         margin-right: auto;
        }
    </style>

</head>
<?php require '../navbar.php' ?>

<body>
    <!---------- Welcome the user ---------->
    <div class="welcome-box"></div>
    <div id="container-msg">
        <div class="welcome">
            <h1 class="welcome-msg"> 
                Welcome back, <?php echo ucfirst($row['name']) ;?>!
            </h1>
            <h4 class="welcome-msg-2">
                Ready to quiz? Let the fun begin!
            </h4>
            <br>
            <?php 
            $query_quiz = "SELECT quiz_id FROM quiz";
            $quizResult2 = $con->query($query_quiz);

            if ($quizResult2 && $quizResult2->num_rows > 0) {
                echo '<a class="btn create btn-welcome" id="createQuizBtn" onclick="quizConfirmation()">
                    Quizit Now </a>';
            }else{
                echo '<a href="../quiz/create_quiz.php"><button class="btn create " type="submit">Create a Quiz</button></a>
                ';
            }
            
    ?>
        </div>
    </div>

    <script>
    function quizConfirmation() {
        var choice = confirm('Do you want to take a random quiz?');
        if (choice == true) {
            <?php 
                $query_quiz = "SELECT quiz_id FROM quiz";
                $quizResult2 = $con->query($query_quiz);
                $IDPool = [];
                if ($quizResult2 && $quizResult2->num_rows > 0) {
                    while ($row = $quizResult2->fetch_assoc()) {
                        $IDPool[] = $row['quiz_id'];
                    }
                    $randomID = $IDPool[array_rand($IDPool)];
                    echo 'window.location.href = "../quiz/attempt_quiz.php?quiz_id='.$randomID.'";';
                } else {
                    echo 'alert("No quizzes available");';
                }
            ?>
        } else {
            alert('Okay, maybe next time!');
        }
    }
    </script>

    <br>
    <br>
    <br>


    <!---------- quiz details modal ---------->
    <div class="modal fade" id="quizDetailsModal" tabindex="-1" aria-labelledby="quizDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="quizDetailsModalLabel">Quiz Details</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6">
                        <img id="quizImage" src="" alt="Quiz Image" class="img-fluid">
                    </div>
                    <div class="col-md-6" id='quiz-info'>
                        <h4 class="model-header" id="quizName"></h4>
                        <p id="numQuestions"></p>
                        <p id="creatorName"></p>
                        <span style="vertical-align: center; display: flex;;">
                            <a id="startQuizBtn" class="btn create">Start Quiz</a>
                            <a id="editQuizBtn" class="" style="padding-right: 5px; padding-left: 10px;"><i class="fa fa-pencil-square-o fa-2x fa-fw" style="color: #f5a60f; padding-top: 5px;"></i></a>
                            <a id="deleteQuizBtn" class="" style="padding-right: 5px;" onclick="return confirm('Are you sure you want to delete this quiz?')"><i class="fa fa-trash fa-2x fa-fw" style="color: red; padding-top: 3px;"></i></a>

                        </span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="container-central" onclick="openQuizDetailsModal">
        <h2 class="welcome">Your Quizzes</h2>
        <?php 
        // Fetch quizzes from the quiz table
        $quizQuery = "SELECT * FROM quiz WHERE creator_id=" . $_SESSION['User'];
        $quizResult = $con->query($quizQuery);

        // Check if there are quizzes
        if ($quizResult && $quizResult->num_rows > 0) {
            echo '<div class="quizzes-container">';
            while ($quizRow = $quizResult->fetch_assoc()) {
                // Display each quiz
                $randomImagePath = getRandomImagePath();
                $notCommunity = "undefined";
                echo '<div class="quiz-container" onclick="openQuizDetailsModal(' . $quizRow['quiz_id'] . ', \'' . $quizRow['quiz_name'] . '\', \'' . $quizRow['questions'] . '\', \'' . $randomImagePath . '\', \'' . $notCommunity . '\')">'; 
                echo '<img src="' . $randomImagePath . '" alt="Quiz Image">';
                echo '<p>' . $quizRow['quiz_name'] . '</p>';
                echo '</div>';            
            }
            echo '</div>';
        } else {
            echo '<h6 class="welcome">No quizzes found.</h6>';
        }
        ?>
    </div>

    <br>
    <br>
    <br>
    

    <div id="container-central" onclick="openQuizDetailsModal">
        <h2 class="welcome">Community Quizzes</h2>
        <?php 
        // Fetch quizzes from the quiz table
        $quizQuery = "SELECT * FROM quiz WHERE creator_id !=" . $_SESSION['User'];
        $quizResult = $con->query($quizQuery);

        // Check if there are quizzes
        if ($quizResult && $quizResult->num_rows > 0) {
            echo '<div class="quizzes-container">';
            while ($quizRow = $quizResult->fetch_assoc()) {
                // get creator name
                $quizQuery1 = "SELECT * FROM account WHERE id =" . $quizRow['creator_id'];
                $quizResult1 = $con->query($quizQuery1);
                $quizRow1 = $quizResult1->fetch_assoc();
                $creator_id = $quizRow1['name'];

                // Display each quiz
                $randomImagePath = getRandomImagePath();
                echo '<div class="quiz-container" onclick="openQuizDetailsModal(' . $quizRow['quiz_id'] . ', \'' . $quizRow['quiz_name'] . '\', \'' . $quizRow['questions'] . '\', \'' . $randomImagePath . '\', \'' . $quizRow1['name'] . '\')">'; 
                echo '<img src="' . $randomImagePath . '" alt="Quiz Image">';
                echo '<p>' . $quizRow['quiz_name'] . '</p>';
                echo '</div>';            
            }
            echo '</div>';
        } else {
            echo '<h6 class="welcome">No quizzes found.</h6>';
        }
        ?>

        
    </div>

</body>

<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>


    <!-- I need to call all the quizzes using a query, then append it into a list, then randomise and call 1 of the query lines -->

<script>
    function openQuizDetailsModal(quizId, quizName, numQuestions, imagePath, community) {
    // Set the modal content dynamically
    var quizInfo = document.getElementById('quiz-info');
    var quizImage = document.getElementById('quizImage');
    var quizNameElement = document.getElementById('quizName');
    var numQuestionsElement = document.getElementById('numQuestions');
    var startQuizBtn = document.getElementById('startQuizBtn');

    // Update the image source
    quizImage.src = imagePath;

    // reset the edit button
    var editBtn = document.getElementById('editQuizBtn');
    var deleteBtn = document.getElementById('deleteQuizBtn');
    editBtn.style.display='none';
    deleteBtn.style.display='none';

    // Update other modal content
    quizNameElement.innerText = "Topic: " + quizName;
    numQuestionsElement.innerText = "Number of Questions: " + numQuestions ;
    var editQuizBtn = document.createElement('a'); // Use document.createElement

    if(community !== 'undefined'){
        var creatorNameElement = document.getElementById('creatorName');
        creatorNameElement.innerText = "Creator: " + community;
        numQuestionsElement.style.marginBottom = "0px";
    }else{
        // edit button 
        editBtn.style.display='inline';
        editBtn.href = '../quiz/view_quiz.php?quiz_id=' + quizId;

        // delete button
        deleteBtn.style.display='inline';
        deleteBtn.href =  '../quiz/delete_quiz.php?quiz_id=' + quizId;
    }

    // Set the href attribute for the "Start Quiz" button
    startQuizBtn.href = '../quiz/attempt_quiz.php?quiz_id=' + quizId;
    // Show the modal

    $('#quizDetailsModal').modal('show');
  }

</script>


</footer>

</html>