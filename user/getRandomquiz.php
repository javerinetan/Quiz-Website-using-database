<?php
// getRandomQuiz.php

require_once('../connection.php');

$quizQuery = "SELECT * FROM quiz ORDER BY RAND() LIMIT 1";
$instance = new DatabaseConnection();
$quizResult = $instance->retrieveData($quizQuery);

$response = [];

if ($quizResult && $quizResult->num_rows > 0) {
    $response['success'] = true;
    $response['quizData'] = $quizResult->fetch_assoc();
} else {
    $response['success'] = false;
}

echo json_encode($response);
?>