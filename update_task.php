<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = intval($_POST['task_id']);
    $task_deadline = !empty($_POST['task_deadline']) ? $conn->real_escape_string($_POST['task_deadline']) : null;
    $task_status = !empty($_POST['task_status']) ? $conn->real_escape_string($_POST['task_status']) : null;

    $update_fields = [];

    if ($task_deadline) {
        $update_fields[] = "task_deadline='$task_deadline'";
    }
    if ($task_status) {
        $update_fields[] = "task_status='$task_status'";
    }

    if (!empty($update_fields)) {
        $update_query = "UPDATE tasks SET " . implode(', ', $update_fields) . " WHERE task_id=$task_id";

        if ($conn->query($update_query) === TRUE) {
            echo "Task updated successfully!";
        } else {
            echo "Error updating task: " . $conn->error;
        }
    } else {
        echo "No fields to update.";
    }
}

$conn->close();
?>
