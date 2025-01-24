<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_id = $conn->real_escape_string($_POST['task_id']);

    $sql = "DELETE FROM tasks WHERE task_id = $task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Task deleted successfully!";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
}

$conn->close();
?>
