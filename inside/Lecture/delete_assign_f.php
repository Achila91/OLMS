<?php
 // Include config file
 include 'connection.php';


 $id=$_GET['id'];
 //echo $id;

 $sql = "delete from c_assign WHERE id=$id";

 if ($con->query($sql) === TRUE) {
   echo "<script>alert('Successfully removed!');</script>";
  echo "<script>window.location.href ='../index.php?tab=assign_batch'</script>";
  } else {
    echo "<script>alert('Error occured!');</script>". $con->error;
    echo "<script>window.location.href ='../index.php?tab=assign_batch'</script>";
  }
  
  $con->close();
  ?>