<?php
require 'db_connection.php'; // Include the connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $task_name = $conn->real_escape_string(trim($_POST['task_name']));
    $task_description = $conn->real_escape_string(trim($_POST['task_description']));
    $task_deadline = $_POST['task_deadline'];
    $task_status = $conn->real_escape_string(trim($_POST['task_status']));

    // Validation
    if (empty($task_name) || empty($task_description) || empty($task_deadline) || empty($task_status)) {
        die("All fields are required.");
    }

    if (!strtotime($task_deadline)) {
        die("Invalid date format for the deadline.");
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tasks (task_name, task_description, task_deadline, task_status) 
                            VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $task_name, $task_description, $task_deadline, $task_status);

    // Execute the query
    if ($stmt->execute()) {
        echo "New task added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the statement
}

$conn->close(); // Close the database connection
?>

