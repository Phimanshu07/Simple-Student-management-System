<?php
 
 $conn=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($conn,"sms");
 $query="insert into students values('',$_POST[roll_no],'$_POST[name]','$_POST[father_name]','$_POST[class]',$_POST[mobile],'$_POST[email]',
         $_POST[password],'$_POST[remark]')";
 
 $query_run=mysqli_query($conn,$query);
?>
<script type="text/javascript">
    alert("Studebt Added Successfully");
    window.location.href="admin_dashboard.php";
</script>