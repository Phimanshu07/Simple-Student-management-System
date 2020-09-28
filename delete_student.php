<script type="text/javascript">

  if(confirm("Are you sure to delete the student database?")){
     document.write("  <?php
                   $conn=mysqli_connect("localhost","root","");
                   $db=mysqli_select_db($conn,"sms");
                  $query="delete from students where roll_no=$_POST[roll_no]";
                  echo $query;
                  $query_run=mysqli_query($conn,$query);?>");
                  
   window.location.href="admin_dashboard.php";
  }
  else{
    
    window.location.href="admin_dashboard.php";
  }
</script>

