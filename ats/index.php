<?php include 'db_connect.php'; // I included the database connection file. ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- I set the character encoding to UTF-8. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- I set the viewport settings for responsive design. -->
    <title>Job Application Scoring System</title> <!-- I set the title of the web page. -->
    <link rel="stylesheet" href="styles.css"> <!-- I linked the external CSS stylesheet. -->
</head>
<body>
    <h1>Job Application Scoring System</h1> <!-- I added the main heading for the web page. -->
    <form action="process.php" method="POST"> <!-- I designed the form to send data to 'process.php' using the POST method. -->
        <label for="job_id">Select Job Application:</label> <!-- I created a label for the job application select dropdown. -->
        <select name="job_id" id="job_id"> <!-- I designed the dropdown menu for selecting a job application. -->
            <?php
            $stmt = $pdo->query("SELECT id FROM job_applications"); // I executed a query to fetch job application IDs from the database.
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // I looped through each result row.
                echo "<option value='{$row['id']}'>{$row['id']}</option>"; // I generated an option element for each job application ID.
            }
            ?>
        </select>
        <input type="submit" value="Get Scores"> <!-- I added a submit button to the form. -->
    </form>
</body>
</html>
