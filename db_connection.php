<? php
// Database configuration
$host = "localhost";  // Update this with your host (default: localhost)
$username = "root";   // Update this with your MySQL username
$password = "";       // Update this with your MySQL password
$database = "task_management"; // Update this with your database name

try {
    // Create a new MySQLi connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Uncomment the line below for debugging
    // echo "Connected successfully";
} catch (Exception $e) {
    // Display error message and exit the script
    die("Database Connection Error: " . $e->getMessage());
}
?>
