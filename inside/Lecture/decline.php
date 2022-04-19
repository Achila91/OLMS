<?php
 // Include config file
 include 'connection.php';


 $id=$_GET['id'];
 echo $id;
//  $query = mysqli_query($con, "update c_assign set hr=hr+(select to_time from t_time where id=$id) where c_name=(select co_name from t_time where id=$id)");

// if($query){
 $sql = "update t_time set approval='Declined' WHERE id=$id";

 if ($con->query($sql) === TRUE) {
   echo "<script>alert('Lecture coverage rejected!');</script>";
  echo "<script>window.location.href ='../index.php?tab=approve_lecs'</script>";
  } else {
    echo "<script>alert('Error occured!');</script>". $con->error;
    // echo "<script>window.location.href ='approve.php'</script>";
  }
// }
  $con->close();
  ?>