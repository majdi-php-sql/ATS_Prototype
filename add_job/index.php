<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <!-- I linked the custom stylesheet for styling -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Job Application Form</h1>
        <!-- I created the job application form -->
        <form action="submit.php" method="post">
            <!-- I added a field for required skills -->
            <label for="required_skills">Required Skills:</label>
            <textarea id="required_skills" name="required_skills" required></textarea>
            
            <!-- I added a field for required years of experience -->
            <label for="required_years_experience">Required Years of Experience:</label>
            <input type="number" id="required_years_experience" name="required_years_experience" required>
            
            <!-- I added a dropdown for required gender of applicant -->
            <label for="required_gender">Required Gender of Applicant:</label>
            <select id="required_gender" name="required_gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            
            <!-- I added a field for required age of applicant -->
            <label for="required_age">Required Age of Applicant:</label>
            <input type="number" id="required_age" name="required_age" required>
            
            <!-- I added a field for the place of work -->
            <label for="place_of_work">Place of Work:</label>
            <input type="text" id="place_of_work" name="place_of_work" required>
            
            <!-- I added a field for additional skills -->
            <label for="additional_skills">Additional Skills:</label>
            <textarea id="additional_skills" name="additional_skills"></textarea>
            
            <!-- I added a field for job description -->
            <label for="job_description">Job Description:</label>
            <textarea id="job_description" name="job_description" required></textarea>
            
            <!-- I created a submit button -->
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
