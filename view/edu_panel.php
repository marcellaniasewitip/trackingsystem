<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
     integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <title>Educational Project</title>
</head> 
<body>
  <section class="container">

    <div class="main">
      <table class="table table-hover table-warning text-center table-bordered">
        <thead class="table-primary">  
          <tr>
            <th scope="col">Project Code</th>  
            <th scope="col">Project Type</th>  
            <th scope="col">Project Description</th>     
            <th scope="col">Project Cost</th>  
            <th scope="col">Schedule</th>  
            <th scope="col">Location</th>  
          </tr>
        </thead>  
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
          Education Projects
        </nav> 
        <tbody> 
          <table class="table table-hover table-warning text-center table-bordered">
            <tbody> 
              <?php
              include "../db_name.php";

              // Define the ID to search for
              $searchId = 'ED101';

              // Define the SQL query for health with a condition for the specific ID
              $sql = "SELECT projectID, projectType, projectDescription, projectCost FROM project WHERE projectID = '$searchId'";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                  // Check if the record with the specified ID exists
                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>{$row['projectID']}</td>";
                          echo "<td>{$row['projectType']}</td>";                            
                          echo "<td>{$row['projectDescription']}</td>";                            
                          echo "<td>{$row['projectCost']}</td>";                           
                          echo '<td><a href="edu_schedule.php?projectID='.$row['projectID'].'" class="btn btn-primary">View</a></td>';
                          echo '<td><a href="edu_location.php?projectID='.$row['projectID'].'" class="btn btn-primary">View</a></td>';
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='6'>No data available for ID $searchId in the Educational Sector.</td></tr>";
                  }
              } else {
                  echo "<tr><td colspan='6'>Error: " . mysqli_error($conn) . "</td></tr>";
              }

              // Close the database connection
              mysqli_close($conn);
              ?>
            </tbody>
          </table>
          <br><br>
          <a href="../admin/project/html/project_update.php" class="btn btn-dark mb-3">Exit</a> 
        </tbody>
      </table>
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
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
