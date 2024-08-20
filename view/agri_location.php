<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Location Details</title>
 <!-- Custom CSS -->
 <style>

body, h1, h2, h3, p, ul, ol, li {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
}
body {
    background: linear-gradient(rgba(17, 9, 9, 0.8), rgba(231, 230, 229, 0.8));
    padding: 20px;
}
.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 20px;
}
.navbar {
    background-color: #007BFF;
    color: #fff;
    padding: 10px;
    text-align: center;
    font-size: 24px;
}
.alert {
    background-color: #ffc107;
    color: #333;
    padding: 10px;
    margin-bottom: 20px;
}
.alert button.close {
    padding: 10px;
    margin-left: 10px;
}
.table th {
    background-color: #007BFF;
    color: #fff;
    font-weight: bold;
    text-align: center;
}
.table tbody tr:hover {
    background-color: #f2f2f2;
}
.table td, .table th {
    text-align: center;
    vertical-align: middle;
}
.navbar-road {
    background-color: #00ff5573;
    font-size: 28px;
    padding: 10px;
    text-align: center;
}
.exit-button {
    margin-top: 20px;
    text-align: center;
}

.exit-button a {
    text-decoration: none;
    font-size: 24px;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.exit-button a:hover {
    background-color: #555;
}

/* Style the "View" buttons */
.exit-button {
    text-decoration: none;
    font-size: 20px;
    padding: 5px 15px;
    background-color: #007BFF;
    color: #000;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    cursor: pointer;
}

.exit-button:hover {
    background-color: #fff;
}
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

</head>
<body>
    <br><br><br>
    <section class="container">
        <div class="container-menu">
            <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #000;">
                Location Details
            </nav>
            <?php
            include "../db_name.php";

            if(isset($_GET['projectID'])){
                $projectID = $_GET['projectID'];

                $sql =  $sql = "SELECT llg.LLGID, llg.llgName, llg.wardID, ward.wardName FROM project
                JOIN llg ON llg.projectID = project.projectID
                LEFT JOIN ward ON llg.wardID = ward.wardID
                WHERE project.projectID = '$projectID'";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-hover table-warning text-center">';
                        echo '<thead class="table-primary mb-5">';
                        echo '<tr>';
                        echo '<th scope="col">LLG ID</th>';
                        echo '<th scope="col">LLG Name</th>';
                        echo '<th scope="col">Ward ID</th>';
                        echo '<th scope="col">Ward Name</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['LLGID'] . '</td>';
                            echo '<td>' . $row['llgName'] . '</td>';
                            echo '<td>' . $row['wardID'] . '</td>';
                            echo '<td>' . $row['wardName'] . '</td>';
                            echo '</tr>';
                        }
                        
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo '<p>No location information found for Project ID ' . $projectID . '</p>';
                    }
                } else {
                    echo 'Error: ' . mysqli_error($conn);
                }
            } else {
                echo '<p>Project ID is not provided in the URL.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>

            <br><br>
            <a href="agri_panel.php" class="btn btn-success">Back</a>
            <a href="../index.php" class="btn btn-danger">Exit</a>
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
