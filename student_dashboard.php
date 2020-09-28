<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style type="text/css">
   #header{
       height:10%;
       width:100%;
       top:2%;
       background-color:gray;
       position:fixed;
       color:white;
   }
   #left{
       height:75%;
       width:15%;
       top:10%;
       position:fixed;
       
   }
   #right{
       height:75%;
       width:80%;
       background-color:whitesmoke;
       position:fixed;
       left:17%;
       top:21%;
       color:red;
       border:solid 1px black;
       
   }
   #top_span{
       top:15%;
       width:80%;
       left:17%;
       position:fixed;
   }
   #td,#id{
     border:solid 1px black;
     width:200px;
     left:17%;
     top:21%;
     color:Blue;
     padding-left:2px;
     text-align:center;

   }
   #id{
     color:orange;
   }
   
</style>

  <?php
    session_start();
    $conn=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($conn,"sms");
    

  ?>
    <title>Student Dashboard</title>
</head>
<body>
    <div id="header">
     <center><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
     Email: <?php  echo $_SESSION['email']; ?> 
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      Name: <?php  echo $_SESSION['name']; ?>  &nbsp;&nbsp;&nbsp;
       <a href="logout.php">&nbsp;Logout</a>
     </center>
    </div>
    <span id="top_span"><marquee>Note:This portal is open till 20 oct... pls edit your information if wrong </marquee></span>
    <div id="left"><br><br><br><br>
      <form action="" method="post">
        <table>
          <tr>
            <td>
             <input type="submit" value="Show Details" name="show_details">
            </td>
          </tr>

          <tr>
            <td>
             <input type="submit" value="Edit   Details" name="edit_details">
            </td>
          </tr>

          
        </table>
      </form>
    </div>

    <div id="right">
      <div id="demo">
        
       <?php
         if(isset($_POST['show_details'])){
             $query="select * from students where email ='$_SESSION[email]'";
             $query_run=mysqli_query($conn,$query);
             while($row=mysqli_fetch_assoc($query_run)){
                 ?><br>
                 <center>
                   <table>
                     <tr>
                      <td><b>Roll No:</b></td>
                      <td>
                        <input type="text" name="" id="" value="<?php echo $row['roll_no'] ?>" disabled>
                      </td>
                    </tr>

                    <tr>
                      <td><b>Name:</b></td>
                      <td>
                        <input type="text" name="" id="" value="<?php echo $row['name'] ?>" disabled>
                      </td>
                    </tr>

                    <tr>
                      <td><b>Father Name:</b></td>
                      <td>
                        <input type="text" name="" id="" value="<?php echo $row['father_name'] ?>" disabled>
                      </td>
                    </tr>

                    <tr>
                      <td><b>Class:</b></td>
                      <td>
                        <input type="text" name="" id="" value="<?php echo $row['class'] ?>" disabled>
                      </td>
                    </tr>

                    <tr>
                      <td><b>Mobile No:</b></td>
                      <td>
                        <input type="text" name="" id="" value="<?php echo $row['mobile'] ?>" disabled>
                      </td>
                    </tr>

                    <tr>
                      <td><b>Email:</b></td>
                      <td>
                        <input type="text" name="" id="" value="<?php echo $row['email'] ?>" disabled>
                      </td>
                    </tr>

                    <tr>
                      <td><b>Password:</b></td>
                      <td>
                        <input type="text" name="" id="" value="<?php echo $row['password'] ?>" disabled>
                      </td>
                    </tr>

                    <tr>
                      <td><b>Remark:</b></td>
                      <td>
                        <textarea name="" id="" cols="40" rows="3"  disabled><?php echo $row['remark'] ?></textarea>
                      </td>
                    </tr>
                   </table>
                 </center>
                 <?php
             }
         }
       ?>
       <?php 
        if(isset($_POST['edit_details'])){
          $query="select * from students where email ='$_SESSION[email]'";
          $query_run=mysqli_query($conn,$query);
          while($row=mysqli_fetch_assoc($query_run)){
            ?>
            <center>
            <form action="edit_student.php" method="post">
             
            <table>
                     <tr>
                      <td><b>Roll No:</b></td>
                      <td>
                        <input type="text" name="roll_no" id="" value="<?php echo $row['roll_no'] ?>" >
                      </td>
                    </tr>

                    <tr>
                      <td><b>Name:</b></td>
                      <td>
                        <input type="text" name="name" id="" value="<?php echo $row['name'] ?>" >
                      </td>
                    </tr>

                    <tr>
                      <td><b>Father Name:</b></td>
                      <td>
                        <input type="text" name="father_name" id="" value="<?php echo $row['father_name'] ?>" >
                      </td>
                    </tr>

                    <tr>
                      <td><b>Class:</b></td>
                      <td>
                        <input type="text" name="class" id="" value="<?php echo $row['class'] ?>" >
                      </td>
                    </tr>

                    <tr>
                      <td><b>Mobile No:</b></td>
                      <td>
                        <input type="text" name="mobile" id="" value="<?php echo $row['mobile'] ?>" >
                      </td>
                    </tr>

                    <tr>
                      <td><b>Email:</b></td>
                      <td>
                        <input type="text" name="email" id="" value="<?php echo $row['email'] ?>" >
                      </td>
                    </tr>

                    <tr>
                      <td><b>Password:</b></td>
                      <td>
                        <input type="text" name="password" id="" value="<?php echo $row['password'] ?>" >
                      </td>
                    </tr>

                    <tr>
                      <td><b>Remark:</b></td>
                      <td>
                        <textarea name="remark" id="" cols="40" rows="3"  ><?php echo $row['remark'] ?></textarea>
                      </td>
                    </tr>

                    <tr>
                      <td></td>
                      <td>
                        <input type="submit" value="Save" name="save">
                      </td>
                    </tr>
                   </table>
            </form>
            </center>
            <?php
          }
        }
       ?>
      </div>
    </div>
</body>
</html>