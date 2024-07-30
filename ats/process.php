<?php
include 'db_connect.php'; // I included the database connection file

// Function to calculate cosine similarity between two vectors
function calculateCosineSimilarity($vectorA, $vectorB) {
    $dotProduct = 0;
    $normA = 0;
    $normB = 0;
    foreach ($vectorA as $key => $value) {
        $dotProduct += $value * $vectorB[$key];
        $normA += $value * $value;
        $normB += $vectorB[$key] * $vectorB[$key];
    }
    if ($normA == 0 || $normB == 0) {
        return 0; // If either vector is all zeros, return 0 to avoid division by zero
    }
    return $dotProduct / (sqrt($normA) * sqrt($normB)); // I calculated the cosine similarity
}

// Function to get the word vector for a given text and vocabulary
function getWordVector($text, $vocab) {
    $words = array_count_values(str_word_count(strtolower($text), 1)); // I converted text to lowercase and counted word occurrences
    $vector = [];
    foreach ($vocab as $word) {
        $vector[$word] = isset($words[$word]) ? $words[$word] : 0; // I built the vector based on the vocabulary
    }
    return $vector;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_id = $_POST['job_id']; // I retrieved the job ID from the POST request

    // Fetch job application details from the database
    $stmt = $pdo->prepare("SELECT * FROM job_applications WHERE id = ?");
    $stmt->execute([$job_id]);
    $job = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$job) {
        die("Job application not found."); // I handled the case where the job application is not found
    }

    $required_skills = explode(',', $job['required_skills']); // I processed required skills
    $required_gender = $job['required_gender']; // I retrieved required gender
    $place_of_work = $job['place_of_work']; // I retrieved place of work
    $additional_skills = explode(',', $job['additional_skills']); // I processed additional skills

    // Fetch applicants from the database
    $stmt = $pdo->query("SELECT * FROM applicants");
    $applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $results = [];

    foreach ($applicants as $applicant) {
        $cv = $applicant['cv']; // I retrieved the CV text
        $cv_file = $applicant['cv_file']; // I retrieved the path to the CV file

        // Compare required skills
        $required_skills_value = 0;
        $total_skills = count($required_skills);
        foreach ($required_skills as $skill) {
            $skill = trim($skill);
            if (strpos($cv, $skill) !== false) {
                $required_skills_value += 100; // I calculated the match percentage for required skills
            }
        }
        $required_skills_value = ($total_skills > 0) ? ($required_skills_value / $total_skills) : 0; // I averaged the required skills value

        // Compare required gender
        $required_gender_value = ($required_gender === $applicant['gender']) ? 100 : 25; // I assigned a score based on gender match

        // Compare place of work
        $place_of_work_value = (strpos($cv, $place_of_work) !== false) ? 100 : 25; // I assigned a score based on place of work match

        // Compare additional skills
        $additional_skills_value = 0;
        $total_additional_skills = count($additional_skills);
        foreach ($additional_skills as $skill) {
            $skill = trim($skill);
            if (strpos($cv, $skill) !== false) {
                $additional_skills_value += 100; // I calculated the match percentage for additional skills
            }
        }
        $additional_skills_value = ($total_additional_skills > 0) ? ($additional_skills_value / $total_additional_skills) : 0; // I averaged the additional skills value

        // Static compare value
        $static_compare_value = ($required_skills_value + $required_gender_value + $place_of_work_value + $additional_skills_value) / 4; // I calculated a static comparison value

        // NLP Compare value using cosine similarity
        $vocab = array_unique(array_merge(str_word_count(strtolower($cv), 1), $required_skills, $additional_skills)); // I built the vocabulary from the CV and skills
        $cvVector = getWordVector($cv, $vocab); // I created the vector for the CV
        $jobSkillsVector = getWordVector($job['required_skills'], $vocab); // I created the vector for required skills
        $additionalSkillsVector = getWordVector($job['additional_skills'], $vocab); // I created the vector for additional skills

        $npl_compare_value = calculateCosineSimilarity($cvVector, $jobSkillsVector) * 100; // I calculated the NLP comparison value using cosine similarity

        // Final score
        $cv_score = (($static_compare_value + $npl_compare_value) / 2); // I calculated the final CV score

        $results[] = [
            'id' => $applicant['id'],
            'name' => $applicant['name'],
            'age' => $applicant['age'],
            'gender' => $applicant['gender'],
            'cv_score' => number_format($cv_score, 2),
            'cv_file' => $cv_file
        ];
    }

    // Sort results by cv_score in descending order
    usort($results, function ($a, $b) {
        return $b['cv_score'] <=> $a['cv_score']; // I sorted the results based on the CV score
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="styles.css"> <!-- I linked the stylesheet for styling -->
</head>
<body>
    <h1>Applicants Scoring</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>CV Score</th>
                <th>CV File</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result): ?>
            <tr>
                <td><?= htmlspecialchars($result['id']) ?></td> <!-- I displayed applicant ID -->
                <td><?= htmlspecialchars($result['name']) ?></td> <!-- I displayed applicant name -->
                <td><?= htmlspecialchars($result['age']) ?></td> <!-- I displayed applicant age -->
                <td><?= htmlspecialchars($result['gender']) ?></td> <!-- I displayed applicant gender -->
                <td><?= htmlspecialchars($result['cv_score']) ?>%</td> <!-- I displayed the CV score -->
                <td><a href="<?= htmlspecialchars($result['cv_file']) ?>" download>Download CV</a></td> <!-- I provided a link to download the CV file -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php">Back</a> <!-- I added a link to return to the previous page -->
</body>
</html>
