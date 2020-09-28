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
      <h3>Admin Login</h3><br>
      
      <form action="" method="post">
     
        <input type="text" name="email" id="" required placeholder="Enter your email"><br><br>
        
        <input type="text" name="password" id="" required placeholder="Enter your password"><br><br>
        <input type="submit" name="submit" value="Login">

     </form><br>

      <?php
        session_start();
        
        if(isset($_POST['submit'])){
            $conn=mysqli_connect("localhost","root","");
            $db=mysqli_select_db($conn,"sms");
            $query="select * from login where email='$_POST[email]'";
            $query_run=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($query_run)){
                if($row['email'] == $_POST['email']){
                    if($row['password'] == $_POST['password']){

                        $_SESSION['name'] =$row['name'];
                        $_SESSION['email'] =$row['email'];
                        
                        header("Location: admin_dashboard.php");
                    }
                    else{
                        echo "Wrong password";
                    }
                }
                else{
                    echo "wrong Email id";
                }
            }
        }   

       
      ?>
    </center>
</body>
</html>