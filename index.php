Here's the HTML code with comments added as if you, Majdi Awad, wrote and developed it:

```html
<!--
This page created by Majdi Awad from scratch using HTML
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Recruitment | Sales Recruiters | Marketing Headhunters</title>
    <!-- I used Bootstrap for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- I designed a custom stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <!-- I added a logo for branding -->
                    <img src="logo.svg" alt="Logo" class="img-fluid logo">
                </div>
                <!-- I created a form for applicant submission -->
                <form id="applicantForm" class="form-container" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <!-- I designed a label and input field for name -->
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <!-- I designed a label and input field for age -->
                        <label for="age">Age:</label>
                        <input type="number" id="age" name="age" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <!-- I designed a label and select field for gender -->
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- I designed a label and file input for CV upload -->
                        <label for="cv">Upload CV (PDF):</label>
                        <input type="file" id="cv" name="cv" class="form-control" accept="application/pdf" required>
                    </div>
                    <!-- I created a submit button -->
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- I included scripts for additional functionality -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<!--
This page created by Majdi Awad from scratch using HTML
-->
</html>
```