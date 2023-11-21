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
            <button class="btn create btn-welcome" id="createQuizBtn" onclick="getQuiz()">
                Quizit Now
            </button>
        </div>
    </div>

    <br>
    <br>
    <br>


    <!---------- Your own quiz ---------->
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
                        <a id="editQuizBtn" class="btn btn-secondary">Edit</a>
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
                echo '<div class="quiz-container" onclick="openQuizDetailsModal(' . $quizRow['quiz_id'] . ', \'' . $quizRow['quiz_name'] . '\', \'' . $quizRow['questions'] . '\', \'' . $randomImagePath . '\')">'; 
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

    <!---------- Community quiz ---------->
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
                        <a id="editQuizBtn" class="btn btn-secondary">Edit</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

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
                // Display each quiz
                $randomImagePath = getRandomImagePath();
                echo '<div class="quiz-container" onclick="openQuizDetailsModal(' . $quizRow['quiz_id'] . ', \'' . $quizRow['quiz_name'] . '\', \'' . $quizRow['questions'] . '\', \'' . $randomImagePath . '\')">'; 
                echo '<div class="quiz-container" onclick="'.$modal.'")">';
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
    function openQuizDetailsModal(quizId, quizName, numQuestions) {
        // Set the modal content dynamically
        var quizNameElement = document.getElementById('quizName');
        var numQuestionsElement = document.getElementById('numQuestions');
        var startQuizBtn = document.getElementById('startQuizBtn');
        var editQuizBtn = document.getElementById('editQuizBtn');

        // Update other modal content
        quizNameElement.innerText = quizName;
        numQuestionsElement.innerText = "Number of Questions: " + numQuestions;

        // Set the href attribute for the "Start Quiz" button
        startQuizBtn.href = '../quiz/attempt_quiz.php?quiz_id=' + quizId;
        editQuizBtn.href = '../quiz/edit_quiz.php?quiz_id=' + quizId;

        // Show the modal
        $('#quizDetailsModal').modal('show');
    }
</script>

<script>
    
    function getQuiz() {
    // Assuming list is an array of quiz IDs, fetch it from PHP
    var list = [<?php
        $query = "SELECT quiz_id FROM quiz";
        $instance = new DatabaseConnection();
        $result = $instance->retrieveData($query);
        $quizIds = [];

        while ($row = $result->fetch_assoc()) {
            $quizIds[] = $row['quiz_id'];
        }

        echo implode(',', $quizIds);
    ?>];

    // Get a random quiz ID
    var randomIndex = Math.floor(Math.random() * list.length);
    var randomQuizId = list[randomIndex];

    // Redirect to attempt_quiz.php with the random quiz ID
    window.location.href = '../quiz/attempt_quiz.php?quiz_id=' + randomQuizId;
}

    function getRandomQuiz() {
        // Using AJAX to fetch a random quiz
        $.ajax({
            type: "GET",
            url: "getRandomquiz.php", // Create a separate PHP file to handle this request
            success: function(response) {
                if (response.success) {
                    var quizData = response.quizData;
                    openQuizDetailsModal(quizData.quiz_id, quizData.quiz_name, quizData.questions);
                } else {
                    alert('No quizzes found.'); 
                }
            },
            error: function() {
                alert('Error fetching quiz.');
            }
        });
    }
</script>


</footer>

</html>