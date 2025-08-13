<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="smsp.css" type="text/css">
</head>

<body>

    <div class="main row">

        <div class="main-container col-4">
            <div class="dropdown">
                <button class="dropbtn">Login</button>
                <div class="dropdown-content">
                    <a href="prin_login.php">Principal</a>
                    <a href="tech_login.php">Teacher</a>
                    <a href="stu_login.php">Student</a>
                </div>
            </div>
        </div>
        <div class="main-container col-4">
            <div class="dropdown">
                <button class="dropbtn">Register</button>
                <div class="dropdown-content">
                    <a href="prin_login.php">Principal</a>
                    <a href="tech_login.php">Teacher</a>
                    <!-- <a href="stu_reg.php">Student</a> -->
                </div>
            </div>
        </div>

    </div>

</body>

</html>