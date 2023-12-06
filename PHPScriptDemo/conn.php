<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        .results {
            margin-top: 20px;
        }

        .result-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .result-item span {
            font-weight: bold;
            margin-right: 5px;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "phphscriptdemo"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Process the results
    while ($row = $result->fetch_assoc()) {
        echo "StudentID: " . $row["studentID"]. " - FirstName: " . $row["FirstName"]. " - LastName:" . $row["LastnName"]. " - DateOfBirth:" . $row["DateOfBirth"]. " - Email:". $row["Email"]. " - Phone:" . $row["Phone"]."<br>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM instructor";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Process the results
    while ($row = $result->fetch_assoc()) {
        echo "InstructorID: " . $row["InstructorID"]. " - FirstName: " . $row["FirstName"]. " - LastName:" . $row["LastnName"]. " - Email:". $row["Email"]. " - Phone:" . $row["Phone"]."<br>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>