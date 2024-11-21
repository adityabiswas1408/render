<?php
// Include the database connection file
include 'db_connect.php';

// Get the input from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);
$query = strtoupper($data['query']);  // Convert the input to uppercase

// Write your SQL query to fetch data from the table
$sql = "SELECT * FROM vote WHERE IPAS = '$query' OR HRMS = '$query'"; // Replace `your_table_name` with your actual table name
$result = $conn->query($sql);

// Check if any records were found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();  // Fetch the first row (or modify if you expect multiple rows)
    echo json_encode([$row]);  // Return the row as JSON
} else {
    echo json_encode([]);  // No records found
}

$conn->close();
?>
