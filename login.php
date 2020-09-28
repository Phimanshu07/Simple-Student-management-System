<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <center><br><br>
      <h3>Student Management System</h3><br>
      
      <form action="" method="post">
        <input type="submit" name="admin_login" value="Admin Login">
        <input type="submit" name="student_login" value="Student Login">
      </form>

      <?php
        if(isset($_POST['admin_login'])){
            header("Location: admin_login.php");
        }   

        if(isset($_POST['student_login'])){
            header("Location: student_login.php");
        } 
      ?>
    </center>
</body>
</html>