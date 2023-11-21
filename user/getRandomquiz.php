<?php
require_once('../connection.php');

$instance = new DatabaseConnection();

// Fetch a random quiz ID from the database
$query = "SELECT quiz_id FROM quiz ORDER BY RAND() LIMIT 1";
$result = $instance->retrieveData($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $randomQuizId = $row['quiz_id'];

    // Return the random quiz ID as JSON
    echo json_encode(['success' => true, 'quizId' => $randomQuizId]);
} else {
    // No quizzes found
    echo json_encode(['success' => false]);
}
?>