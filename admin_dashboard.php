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
    <title>Admin Dashboard</title>
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
             <input type="submit" value="Search Student" name="search_student">
            </td>
          </tr>

          <tr>
            <td>
             <input type="submit" value="Edit Student" name="edit_student">
            </td>
          </tr>

          <tr>
            <td>
             <input type="submit" value="Add new Student" name="add_new_student">
            </td>
          </tr>

          <tr>
            <td>
             <input type="submit" value="Delete Student" name="delete_student">
            </td>
          </tr>

          <tr>
            <td>
             <input type="submit" value="Show Teachers" name="show_teachers">
            </td>
          </tr>
        </table>
      </form>
    </div>

    <div id="right">
      <div id="demo">
      <!-- search option-->
       <?php
         if(isset($_POST['search_student'])){
             ?>
            <center>
              <form action="" method="post"><br>
                Enter Roll No:
                <input type="text" name="roll_no" id="">
                <input type="submit" value="Search" name="search_by_roll_no_for_search">
              </form>
            </center>
            <?php
         }
         if(isset($_POST['search_by_roll_no_for_search'])){

            $query="select * from students where roll_no='$_POST[roll_no]'";
            $query_run=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($query_run)){
                ?>
                <br><br>
                 <table>
                   <tr>
                    <td><b>Roll No:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="" id="" value="<?php echo $row['roll_no']; ?>" disabled>
                    </td>
                   </tr>
                   <tr>
                    <td><b>Name:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="" id="" value="<?php echo $row['name']; ?>" disabled>
                    </td>
                   </tr>
                   <tr>
                    <td><b>Father Name:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="" id="" value="<?php echo $row['father_name']; ?>" disabled>
                    </td>
                   </tr>
                   <tr>
                    <td><b> Class:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="" id="" value="<?php echo $row['class']; ?>" disabled>
                    </td>
                   </tr>
                   <tr>
                    <td><b> Mobile:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="" id="" value="<?php echo $row['mobile']; ?>" disabled>
                    </td>
                   </tr>
                   <tr>
                    <td><b> Email:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="" id="" value="<?php echo $row['email']; ?>" disabled>
                    </td>
                   </tr>
                   <tr>
                    <td><b>Password:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="" id="" value="<?php echo $row['password']; ?>" disabled>
                    </td>
                   </tr>
                   <tr>
                    <td><b>Remark:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                       <textarea name="" id="" cols="40" rows="3" disabled><?php echo $row['remark']; ?></textarea>
                    </td>
                   </tr>
                 </table>
                <?php
            }
         }
       ?>
       <!-- edit option -->
       <?php
         if(isset($_POST['edit_student'])){
             ?>
            <center>
              <form action="" method="post"><br>
                Enter Roll No:
                <input type="text" name="roll_no" id="">
                <input type="submit" value="Search" name="search_by_roll_no_for_edit">
              </form>
            </center>
            <?php
         }
         if(isset($_POST['search_by_roll_no_for_edit'])){

            $query="select * from students where roll_no='$_POST[roll_no]'";
            $query_run=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($query_run)){
                ?>
                <br><br>
                 <form action="admin_edit_student.php" method="post">
                  
                 <table>
                 <tr>
                    <td><b>Roll No:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="roll_no" id="" value="<?php echo $row['roll_no']; ?>" >
                    </td>
                   </tr>
                   <tr>
                    <td><b>Name:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="name" id="" value="<?php echo $row['name']; ?>" >
                    </td>
                   </tr>
                   <tr>
                    <td><b>Father Name:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="father_name" id="" value="<?php echo $row['father_name']; ?>" >
                    </td>
                   </tr>
                   <tr>
                    <td><b> Class:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="class" id="" value="<?php echo $row['class']; ?>" >
                    </td>
                   </tr>
                   <tr>
                    <td><b> Mobile:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="mobile" id="" value="<?php echo $row['mobile']; ?>" >
                    </td>
                   </tr>
                   <tr>
                    <td><b> Email:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="email" id="" value="<?php echo $row['email']; ?>" >
                    </td>
                   </tr>
                   <tr>
                    <td><b>Password:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                     <input type="text" name="password" id="" value="<?php echo $row['password']; ?>" >
                    </td>
                   </tr>
                   <tr>
                    <td><b>Remark:&nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                       <textarea name="remark" id="" cols="40" rows="3" ><?php echo $row['remark']; ?></textarea>
                    </td>
                   </tr><br><br>

                   <tr>
                   <td></td>
                    <td>
                     <input type="submit" value="Save" name="edit">
                    </td>
                   </tr>
                 </table>
                 </form>
                <?php
            }
         }
       ?>
<!-- Add new Student -->
       
       <?php
         if(isset($_POST['add_new_student'])){
           ?>
           <br>
           <center><h4>Fill the form</h4><br>
           <form action="add_student.php" method="post">
             <table>
               <tr>
                 <td>Roll No:</td>
                 <td>
                   <input type="text" name="roll_no" id="" required>
                 </td>
               </tr>

               <tr>
                 <td>Name:</td>
                 <td>
                   <input type="text" name="name" id="" required>
                 </td>
               </tr>

               <tr>
                 <td>Father Name:</td>
                 <td>
                   <input type="text" name="father_name" id="" required>
                 </td>
               </tr>

               <tr>
                 <td>Class:</td>
                 <td>
                   <input type="text" name="class" id="" required>
                 </td>
               </tr>

               <tr>
                 <td>Mobile No:</td>
                 <td>
                   <input type="text" name="mobile" id="" required>
                 </td>
               </tr>

               <tr>
                 <td>Email:</td>
                 <td>
                   <input type="text" name="email" id="" required>
                 </td>
               </tr>

               <tr>
                 <td>Password:</td>
                 <td>
                   <input type="text" name="password" id="" required>
                 </td>
               </tr>

               <tr>
                 <td>Remark:</td>
                 <td>
                   <textarea name="remark" id="" cols="40" rows="3"></textarea>
                 </td>
               </tr>

               <tr>
                 <td></td>
                 <td>
                   <input type="submit" name="add" value="Add Student">
                 </td>
               </tr>
             </table>
           </form>
         </center>
         <?php

          
         }
       ?>

       <!-- delete -->

       <?php
        
        if(isset($_POST['delete_student'])){
          ?>
          <br>
          <center>
           
           <form action="delete_student.php" method="post">
             Roll No:
             <input type="text" name="roll_no" id="">
             <input type="submit" value="Delete" name="search_by_roll_no_for_delete">
           </form>
          </center>
          <?php
        }
       ?>
       <!-- Teachers information -->
       <?php
        
        if(isset($_POST['show_teachers'])){
          ?>
          <br>
          <center>
            <h5>Teacher's Details</h5>
            <table>
              <tr>
                <td id="id"><b>Id</b></td>
                <td id="id"><b>Name</b></td>
                <td id="id"><b>Email</b></td>
                <td id="id"><b>Mobile</b></td>
                <td id="id"><b>Courses</b></td>
                <td id="id"><b>View Details</b></td>
              </tr>
            </table>
          </center>
          <?php
          $conn=mysqli_connect("localhost","root","");
          $db=mysqli_select_db($conn,"sms");
          $query="select * from teachers";
          $query_run=mysqli_query($conn,$query);
          while($row=mysqli_fetch_assoc($query_run)){
            ?>
            <center>
              <table >
                 <tr>
                  <td id="td"><?php echo $row['t_id'] ?></td>
                  <td id="td"><?php echo $row['name'] ?></td>
                  <td id="td"><?php echo $row['email'] ?></td>
                  <td id="td"><?php echo $row['mobile'] ?></td>
                  <td id="td"><?php echo $row['courses'] ?></td>
                  <td id="td"><a href="#">View Details</a></td>
                 </tr>
              </table>
            </center>
            <?php
          }
        }
       ?>

      </div>
    </div>
</body>
</html>