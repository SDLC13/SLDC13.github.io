<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/apache/logs/php_error.log');

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "evaluation_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection exception drop."]);
    exit();
}

$inputData = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($inputData)) {
    $studentName  = htmlspecialchars(trim($inputData['student_name']));
    $courseLevel  = htmlspecialchars(trim($inputData['course_level']));
    $faculty      = htmlspecialchars(trim($inputData['faculty']));
    $subject      = htmlspecialchars(trim($inputData['subject']));
    $admireText   = htmlspecialchars(trim($inputData['admireText']));
    $improveText  = htmlspecialchars(trim($inputData['improveText']));
    $scoresArray  = $inputData['scores'];

    if (empty($studentName) || empty($courseLevel) || empty($faculty) || empty($subject) || empty($admireText) || empty($improveText) || count($scoresArray) !== 15) {
        echo json_encode(["status" => "error", "message" => "Server validation failure: incomplete payload parameter parameters."]);
        exit();
    }

    $scoreAvg = array_sum($scoresArray) / count($scoresArray);

    $stmt = $conn->prepare("INSERT INTO evaluations (student_name, course_level, faculty_member, subject_desc, score_avg, admired_traits, areas_growth) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdss", $studentName, $courseLevel, $faculty, $subject, $scoreAvg, $admireText, $improveText);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Evaluation for " . $faculty . " synchronized to live server registry matrix successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "SQL Registry Fault: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid transmission standard protocol."]);
}
$conn->close();
?>