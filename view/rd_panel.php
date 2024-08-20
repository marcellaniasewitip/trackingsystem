
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
<link rel="stylesheet" href="display.css">
<style>
/* Reset some default styles */
body, h1, h2, h3, p, ul, ol, li {
    margin: 0;
    padding: 0;
}

/* Set a base font size and family */
body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
}

/* Apply a background color and spacing to the body */
body {
    background: linear-gradient(rgba(17, 9, 9, 0.8), rgba(231, 230, 229, 0.8));
    padding: 20px;
}

/* Center the container */
.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 20px;
}

/* Style the navigation bar */
.navbar {
    background-color: #007BFF;
    color: #000;
    padding: 10px;
    text-align: center;
    font-size: 24px;
}

/* Style the alert message */
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

/* Style the table headers */
.table th {
    background-color: #007BFF;
    color: #fff;
    font-weight: bold;
    text-align: center;
}

/* Style the table rows and cells */
.table tbody tr:hover {
    background-color: #f2f2f2;
}

.table td, .table th {
    text-align: center;
    vertical-align: middle;
}

/* Style the navbar for Road/Bridge Projects */
.navbar-road {
    background-color: #00ff5573;
    font-size: 28px;
    padding: 10px;
    text-align: center;
}

/* Style the "Exit" button */
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
.view-button {
    text-decoration: none;
    font-size: 16px;
    padding: 5px 15px;
    background-color: #007BFF;
    color: #000;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    cursor: pointer;
}

.view-button:hover {
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

    <title>R/B Project</title>
</head> 
<body>
  <br><br><br>
  <section class="container">

<div class="container-menu">
   
  <table class="table table-hover table-warning text-center">

  <thead class="table-primary mb-5">  
   
    <tr>
  
    <th scope="col">Project ID</th> 
    <!--<th scope="col">Project Name</th>  -->
    <th scope="col">Project Type</th>  
    <th scope="col">Project Description</th>      
      <th scope="col">Project Cost</th>  
      <th scope="col">Schedule</th>  
      <th scope="col">Location</th>  
     
    
    </tr>
  </thead>  
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
  Road/Bridge Project(s)
</nav> 
  <tbody> 
 
        <table class="table table-hover table-warning text-center">
          
            <tbody> 
                <?php
                include "../db_name.php";

                // Define the ID to search for
                $searchId = 'RD103';

                // Define the SQL query for health with a condition for the specific ID
                $sql = "SELECT projectID, projectType, projectDescription, projectCost FROM project WHERE projectID = '$searchId'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Check if the record with the specified ID exists
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['projectID']}</td>";
                            //echo "<td>{$row['projectName']}</td>";
                            echo "<td>{$row['projectType']}</td>";
                            echo "<td>{$row['projectDescription']}</td>";                          
                            echo "<td>{$row['projectCost']}</td>";

                            echo '<td><a href="rd_schedule.php?projectID='.$row['projectID'].'" class="view-button">View</a></td>';
                            echo '<td><a href="rd_location.php?projectID='.$row['projectID'].'" class="view-button">View</a></td>';
                           
                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No data available for ID $searchId in the Road/Bridge Sector.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Error: " . mysqli_error($conn) . "</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            
  </tbody>
</table>
<br><br>
  <a href="../admin/project/html/project_update.php" class="btn btn-dark mb-3">Exit</a> 
 
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
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>