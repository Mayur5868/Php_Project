<?php

require("stu_db.php");
session_start();

// Single Delete code

// if (isset($_REQUEST['del'])) {
// 	$id = $_REQUEST['del'];
// 	$del = "delete from reg where uid='$id'";
// 	$con->query($del);
// 	header("location:home.php");
// }


// edit multiple delete code

// if(isset($_REQUEST['sts']))
// {
// 	$id=$_REQUEST['sts'];
// 	$sel="select status from reg where uid='$id'";
// 	$qq=$con->query($sel);
// 	$fr=$qq->fetch_object();
// 	$stt=$fr->status;

// 	if($stt=="Active")
// 	{
// 		$upd="update reg set status='Block' where uid='$id'";
// 		$con->query($upd);
// 	}
// 	else
// 	{
// 		$upd="update reg set status='Active' where uid='$id'";
// 		$con->query($upd);
// 	}
// 	header("location:home.php");
// }


// //multiple delete code

// if (isset($_REQUEST['mul'])) {
// 	$ch = $_REQUEST['hh'];
// 	foreach ($ch as $cv) {
// 		$del = "delete from reg where uid='$cv'";
// 		$con->query($del);
// 	}
// 	header("location:home.php");
// }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Homepage</title>
</head>

<body>
	<h1 align="center">Welcome Homepage</h1>
	<h3 align="center"><?php
						if (isset($_SESSION['user'])) {
							echo "Welcome " . $_SESSION['user'];
						} else {
							header("location:login.php");
						}
						?></h3>
	<h3 align="right"><a href="logout.php">Logout</a></h3>
	<form method="post">

		<table border="1" align="center">
			<tr>
				<!-- <td>#</td> -->
				<td>no.</td>
				<td>Name</td>
				<td>Password</td>
				<td>Gender</td>
				<td>D.O.B</td>
				<td>Email Id</td>
				<td>Mobile No</td>
				<td>Father Mobile No</td>
				<td>S.T.D</td>
				<td>Subject</td>
				<td>City</td>
				<td>Role</td>
				<td colspan="3" align="center">Action</td>
			</tr>
			<?php
			$sel = "select * from student join city on student.stu_city=city.cty_id where stu_id='" . $_SESSION['userid'] . "'";
			// $sel = "select * from student join city on student.stu_city=city.cty_id";
			$qq = $con->query($sel);
			while ($ff = $qq->fetch_object()) {
			?>
				<tr>
					<!-- <td><input type="checkbox" name="hh[]" value="<?php echo $ff->stu_id; ?>"></td> -->
					<td><?php echo $ff->stu_id; ?></td>
					<td><?php echo $ff->stu_name; ?></td>
					<td><?php echo $ff->stu_pass; ?></td>
					<td><?php echo $ff->stu_gender; ?></td>
					<td><?php echo $ff->stu_dob; ?></td>
					<td><?php echo $ff->stu_email; ?></td>
					<td><?php echo $ff->stu_mobile; ?></td>
					<td><?php echo $ff->stu_fmobile; ?></td>
					<td><?php echo $ff->stu_std; ?></td>
					<td><?php echo $ff->stu_sub; ?></td>
					<td><?php echo $ff->cty_name; ?></td>
					<td><?php echo $ff->Role; ?></td>
					<!-- <td><a href="stu_home.php?del=<?php echo $ff->uid; ?>">Delete</a></td> -->
					<td><a href="stu_update.php?edt=<?php echo $ff->stu_id; ?>">Edit</a></td>
					<!-- <td><a href="home.php?sts=<?php echo $ff->uid; ?>"><?php echo $ff->Status; ?></a></td> -->
				</tr>
			<?php
			}
			?>
			<!-- <tr>
				<td align="center" colspan="12"><input type="submit" name="mul" value="Delete"></td>
			</tr> -->
		</table>
	</form>
</body>

</html>