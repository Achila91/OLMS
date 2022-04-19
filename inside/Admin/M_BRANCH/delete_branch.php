<?php
 // Include config file
 include '../../connection.php';


 $id=$_GET['id'];
 echo $id;

 $sql = "delete from branch WHERE branch_id=$id";

 if ($con->query($sql) === TRUE) {
    echo "<script>alert('Branch removed successfully!');</script>";
    echo "<script>window.location.href ='../../index.php?tab=branch'</script>";
  } else {
    echo "<script>alert('Error occured!');</script>". $con->error;
    // echo "<script>window.location.href ='approve.php'</script>";
  }
  
  $conn->close();
  ?>