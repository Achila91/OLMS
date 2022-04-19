<?php
include '../connection.php';

if (isset($_POST['submit'])) {

	$course = $_POST['course'];
	$fee = $_POST['fee'];
	$duration = $_POST['duration'];

	$query = mysqli_query($con, "insert into course (c_name,course_fee,duration,state) value('$course','$fee','$duration','T')");
	if ($query) {


		//echo "<script>alert popup()('Data Successfully Added.');</script>";
		echo "<script>alert('New course added!');</script>";
	} else {
		echo "<script>alert('Error occured!');</script>";
	}
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ECTC | PDP</title>

	<style>
		.field {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 300px;
			font-size: 14px;
		}
	</style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">



		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">

						</div><!-- /.col -->
						<div class="col-sm-6">
							<!-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lecturer Registration</li>
              </ol> -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<div class="frmSearch" align="center">
				<form class="form-inline" action='' method="POST">

					<h3 class="">Manage Courses</h3><br><br>
					<table>
						<tr>
							<td> <label class="control-label" for="course">Course Name &nbsp;&nbsp;&nbsp;</label></td>

							<td> <input type="text" class="field" id="course" name="course" placeholder="Enter Course Name" class="input-xlarge" maxlength="12" style="width: 400px; height:40%; margin-left:0" required></td>

						</tr>
						<tr style="height: 10px;"></tr>
						<tr>
							<td> <label class="control-label" for="fee">Course Fee (Rs) &nbsp;&nbsp;&nbsp;</label></td>

							<td> <input type="text" class="field" id="fee" name="fee" placeholder="Enter Course Fee" class="input-xlarge" maxlength="12" style="width: 400px; height:40%; margin-left:0" required></td>

						</tr>
						<tr style="height: 10px;"></tr>
						<tr>
							<td> <label class="control-label" for="duration">Course Duration (Months)&nbsp;&nbsp;&nbsp;</label></td>

							<td> <input type="text" class="field" id="duration" name="duration" placeholder="Enter Course Duration" class="input-xlarge" maxlength="12" style="width: 400px; height:40%; margin-left:0" required></td>

						</tr>
						<tr style="height: 15px;"></tr>

					</table>
					<div class="control-group">
						<!-- Button -->
						<div class="controls">
							<button class="btn btn-primary" id="submit1" name="submit">Add Course</button>
							<!-- <button class="btn btn-danger" id="submit2" name="submit">Cancel</button> -->
						</div>
					</div>

				</form>
			</div>

			<div class="container " style="padding-left: 5%;  padding-top:03%;">
				<h4>Course Details</h4><br>
				<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search by name...' title='Type in a name'><br><br><br>
				<table class="table table-bordered" id='myTable' width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Course Name</th>
							<th>Course Fee</th>
							<th>Course Duration</th>

							<th>Action</th>
						</tr>
					</thead>
					<?php
					$ret = mysqli_query($con, "select *from course ");

					while ($row = mysqli_fetch_array($ret)) {
					?>

						<tbody>
							<tr>
							<td><?php echo $row['c_name']; ?></td>
							<td> Rs. <?php echo $row['course_fee']; ?></td>
								<td><?php echo $row['duration']; ?> Months</td>

								<td>
									<!-- <a href="edit_lec.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">Edit<i class="feather icon-clock m-t-10 f-16 "></i></a> -->
									<a href="Admin/M_COURSE/delete_course.php?id=<?php echo $row['course_id']; ?>" class="btn btn-xs btn-danger">Remove<i class="feather icon-clock m-t-10 f-16 "></i></a>
								</td>

							</tr>

						</tbody>
					<?php

					} ?>
				</table>


			</div>

		</div>

		<script>
			function myFunction() {
				var input, filter, table, tr, td, i, txtValue;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				table = document.getElementById("myTable");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[0];
					if (td) {
						txtValue = td.textContent || td.innerText;
						if (txtValue.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
					}
				}
			}
		</script>
</body>

</html>