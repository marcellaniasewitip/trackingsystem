<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./index.css">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f9176182d0.js" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <!-- <script src="./index.js"></script>-->

    <title>Home Page</title>
   

</head>
<body>
   
    <div class="container">
   <!-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;"></nav>-->
        <!--<div class="image-container">    -->        
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="photos/n-logo.jpg" alt="Cover Image" style="height: 90px; width: 200px;"></a>
                <a class="navbar-brand navbar-title">NUKU District Project Tracking Management System</a>
            </div>
        </nav>

        <!-- Content -->
        <nav class="navbar navbar-light" style="background-color: #218838;"></nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <!--<a class="navbar-brand" href="#">Home</a>-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                   
                    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
    </li>    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Project
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="./admin/project/html/project_update.php">View Projects</a></li>
            <li><a class="dropdown-item" href="#">Categories of Projects</a></li>
            <li><a class="dropdown-item" href="#">Project Budgets</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="javascript:void(0);" onclick="showLoginForm();">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">Contacts</a>
    </li>
</ul>

                </div>
            </div>
       
        </nav>
       
    <footer>
        <div class="footer--content">
            <p>&copy; 2023 Marcellaniase Witip @ DWU Final Year Project.</p>
        </div>
    </footer>

    <!-- Login Form -->
    <div class="login-container" id="loginContainer">
        <div class="login-form">
            <form name="login-form" action="./login/login.php" method="post">
                <img src="./photos/n-logo.jpg" alt="Customized Image">
                <!--<h2>Login</h2>-->
                <br><br><br>
                <div class="input-group">
                    <span class="input-icon"><i class="fas fa-user"></i></span>
                    <input class="form-control" name="username" type="text" placeholder="Username" aria-label="Username" required autocomplete="off">

                </div><br>
                <div class="input-group">
                    <span class="input-icon"><i class="fas fa-lock"></i></span>
                    <input class="form-control" name="password" type="password" placeholder="Password" aria-label="Password" required autocomplete="off">
                </div>
                <br><br>
                <button class="btn btn-success" type="submit">Login</button>
                <button class="btn btn-danger" type="button" onclick="hideLoginForm();">Cancel</button>
            </form>
        </div>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   

</body>
</html>
