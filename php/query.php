<?php
require_once "config.php"; // Include the configuration file

// SQL query
$sql = "SELECT * FROM your_table";

// Execute query
$result = $conn->query($sql);

// Check if query was successful
if ($result) {
    // If there are rows returned by the query
    if ($result->num_rows > 0) {
        // Fetch data and output it
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
        }
    } else {
        echo "No records found";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
