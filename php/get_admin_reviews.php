<?php
header("Access-Control-Allow-Origin: *");
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
    echo json_encode(["status" => "error", "message" => "Database link connectivity error exception."]);
    exit();
}

$sql = "SELECT student_name, course_level, faculty_member, subject_desc, score_avg, admired_traits, areas_growth, submission_date FROM evaluations ORDER BY id DESC";
$result = $conn->query($sql);

$adminLogs = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $adminLogs[] = [
            "student_name" => $row['student_name'],
            "course_level" => $row['course_level'],
            "faculty"      => $row['faculty_member'],
            "subject"      => $row['subject_desc'],
            "score_avg"    => number_format(floatval($row['score_avg']), 2),
            "admireText"   => $row['admired_traits'],
            "improveText"  => $row['areas_growth'],
            "date"         => date("M d, Y h:i A", strtotime($row['submission_date']))
        ];
    }
}

echo json_encode(["status" => "success", "data" => $adminLogs]);
$conn->close();
?>