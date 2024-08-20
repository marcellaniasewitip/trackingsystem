<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">

    <link rel="stylesheet" href="display.css">
    <style>
        
/* Footer Styling */
.main-footer {
    background-color: #f8f9fa;
    padding: 10px 20px;
    border-top: 1px solid #dee2e6;
    color: #6c757d;
    text-align: center;
    font-size: 14px;
    position: fixed;
    width: 100%;
    bottom: 0;
}

.main-footer a {
    color: #007bff;
    text-decoration: none;
}

.main-footer a:hover {
    text-decoration: underline;
    color: #0056b3;
}

.main-footer .float-right {
    float: right;
}

@media (max-width: 768px) {
    .main-footer .float-right {
        float: none;
        display: block;
        margin-top: 10px;
    }
}


    </style>
    <title>Schedule Details</title>
</head>
<body>
<br><br><br>
    <section class="container">
        <div class="container-menu">
            <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
                Location Details
            </nav>
            <?php
include "../db_name.php";

// Check if the projectID is provided in the URL
if (isset($_GET['projectID'])) {
    $projectID = $_GET['projectID'];

    // Define the SQL query to retrieve location information based on the project ID
    $sql = "SELECT llg.LLGID, llg.llgName, llg.wardID, project.projectType FROM project
            JOIN llg ON llg.projectID = project.projectID
            WHERE project.projectID = '$projectID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if there are any location records
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-hover table-warning text-center">';
            echo '<thead class="table-primary mb-5">';
            echo '<tr>';
            echo '<th scope="col">Schedule ID</th>';
            echo '<th scope="col">Start Date</th>';
            echo '<th scope="col">End Date</th>';
            echo '<th scope="col">Duration</th>';
            echo '<th scope="col">Project Status</th>';
            echo '<th scope="col">Completion Percentage</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                // Determine the redirection link based on the projectType
                $redirectionLink = '';
                switch ($row['projectType']) {
                    case 'Health':
                        $redirectionLink = 'health_panel.php';
                        break;
                    case 'Education':
                        $redirectionLink = 'edu_panel.php';
                        break;
                    // Add more cases for other project types if needed
                    default:
                        $redirectionLink = 'other_panel.php';
                        break;
                }

                echo '<tr>';
                echo '<td>' . $row['scheduleID'] . '</td>';
                echo '<td>' . $row['startDate'] . '</td>';
                echo '<td>' . $row['endDate'] . '</td>';
                echo '<td>' . $row['duration'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '<td>' . $row['percentComplete'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            
            // Close the database connection
            mysqli_close($conn);

            // Redirect the "Back" button based on projectType
            echo '<a href="' . $redirectionLink . '" class="exit-button">Back</a>';
            echo '<a href="../index.php" class="exit-button">Exit</a>';
        } else {
            echo '<p>No location information found for Project ID ' . $projectID . '</p>';
        }
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
} else {
    echo '<p>Project ID is not provided in the URL.</p>';
}
?>


        </div>
    </section>

    <!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Footer <a href="">© Marcellaniase Witip @ DWU Final Year (2023) Project </a>.</strong>
    Project Tracking Management System for Nuku District.
    <div class="float-right d-none d-sm-inline-block">
      <b>Footer</b>
    </div>
  </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
