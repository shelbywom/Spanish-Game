<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spanishquestions";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Get data sent from Unity
$name = $_POST['player_name'];
$score = $_POST['total_score'];

// Insert high score into database
$query = "INSERT INTO `high scores` (`PlayerName`, `TotalScore`) VALUES ('$name', '$score')";
if ($conn->query($query) === TRUE) 
{
    echo "New record created successfully";
} 
else 
{
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();

