<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spanishquestions";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT question, `Correct Answer`, `Incorrect Answer 1`, `Incorrect Answer 2`, `Incorrect Answer 3` FROM questions";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Check if all necessary columns exist in the retrieved row
        if (isset($row["question"]) && isset($row["Correct Answer"]) && isset($row["Incorrect Answer 1"]) && isset($row["Incorrect Answer 2"]) && isset($row["Incorrect Answer 3"])) {
            // Output the question data in the expected format
            echo $row["question"]. ";" . $row["Correct Answer"]. ";" . $row["Incorrect Answer 1"] . ";" . $row["Incorrect Answer 2"] . ";" . $row["Incorrect Answer 3"] . "\n";
        } else {
            // Output an error message if any required column is missing
            echo "Error: Missing data for a question.";
        }
    }
} else {
    echo "0 results";
}

$conn->close();
