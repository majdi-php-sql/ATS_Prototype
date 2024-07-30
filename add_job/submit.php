<?php
// Database configuration
$host = 'localhost'; // I specified the database host
$dbname = 'ats'; // I specified the database name
$username = 'root'; // I specified the database username
$password = 'M48frzjS8M6GJ-B8'; // I specified the database password

try {
    // I created a new PDO instance to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // I set the PDO error mode to exception

    // I retrieved the form data sent via POST
    $required_skills = $_POST['required_skills']; // I retrieved the required skills from the form
    $required_years_experience = $_POST['required_years_experience']; // I retrieved the required years of experience from the form
    $required_gender = $_POST['required_gender']; // I retrieved the required gender from the form
    $required_age = $_POST['required_age']; // I retrieved the required age from the form
    $place_of_work = $_POST['place_of_work']; // I retrieved the place of work from the form
    $additional_skills = $_POST['additional_skills']; // I retrieved the additional skills from the form
    $job_description = $_POST['job_description']; // I retrieved the job description from the form

    // I prepared an SQL statement to insert the form data into the database
    $stmt = $pdo->prepare("INSERT INTO job_applications (required_skills, required_years_experience, required_gender, required_age, place_of_work, additional_skills, job_description) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // I executed the SQL statement with the form data
    $stmt->execute([$required_skills, $required_years_experience, $required_gender, $required_age, $place_of_work, $additional_skills, $job_description]);

    echo "Data successfully submitted!"; // I confirmed successful data submission
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); // I handled and displayed any errors that occurred
}
?>
