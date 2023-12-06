<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phphscriptdemo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<p class='error'>Connection failed: " . $conn->connect_error . "</p>");
}
echo "<p>Connected successfully</p>";

// Query for students
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Process the results
    echo "<h2>Student Results:</h2>";
    echo "<div class='results'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='result-item'>";
        echo "<span>StudentID:</span> " . $row["studentID"]. " - <span>FirstName:</span> " . $row["FirstName"]. " - <span>LastName:</span>" . $row["LastName"]. " - <span>DateOfBirth:</span>" . $row["DateOfBirth"]. " - <span>Email:</span>". $row["Email"]. " - <span>Phone:</span>" . $row["Phone"];
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
}

// Query for instructors
$sql = "SELECT * FROM instructor";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Process the results
    echo "<h2>Instructor Results:</h2>";
    echo "<div class='results'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='result-item'>";
        echo "<span>InstructorID:</span> " . $row["InstructorID"]. " - <span>FirstName:</span> " . $row["FirstName"]. " - <span>LastName:</span>" . $row["LastName"]. " - <span>Email:</span>". $row["Email"]. " - <span>Phone:</span>" . $row["Phone"];
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
}

$conn->close();
?>

</body>
</html>
