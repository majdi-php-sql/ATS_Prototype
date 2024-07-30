<?php
// This page created by Majdi Awad from scratch using PHP

$servername = "localhost"; // I specified the database server name
$username = "root"; // I specified the database username
$password = "M48frzjS8M6GJ-B8"; // I specified the database password
$dbname = "ats"; // I specified the database name

// I established a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// I checked if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // I handled connection errors
}

$name = $_POST['name']; // I retrieved the name from the form submission
$age = $_POST['age']; // I retrieved the age from the form submission
$gender = $_POST['gender']; // I retrieved the gender from the form submission
$cv_text = $_POST['cv_text']; // I retrieved the CV text from the form submission

$uploadDir = 'uploads/'; // I specified the directory for file uploads
$uploadFile = $uploadDir . basename($_FILES['cv']['name']); // I defined the path for the uploaded file
$pdfPath = ''; // I initialized a variable to store the path of the uploaded PDF file

// I moved the uploaded file to the specified directory
if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadFile)) {
    $pdfPath = $uploadFile; // I updated the PDF path if the file was successfully uploaded
} else {
    echo "Error uploading file."; // I handled errors during file upload
    exit;
}

// I prepared an SQL statement to insert the form data into the database
$stmt = $conn->prepare("INSERT INTO applicants (name, age, gender, cv, cv_file) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $name, $age, $gender, $cv_text, $pdfPath); // I bound the form data to the SQL statement

// I executed the SQL statement and checked if it was successful
if ($stmt->execute()) {
    echo "New record created successfully"; // I confirmed successful record creation
} else {
    echo "Error: " . $stmt->error; // I handled errors during record insertion
}

$stmt->close(); // I closed the prepared statement
$conn->close(); // I closed the database connection
// This page created by Majdi Awad from scratch using PHP

?>
