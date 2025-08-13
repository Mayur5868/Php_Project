<?php
require("stu_db.php");

if (isset($_REQUEST['log_sub'])) {
	$u = $_REQUEST['unm'];
	$p = $_REQUEST['pass'];

	$data = array("Enter your Username..!!" => $u, "Enter Your Password..!!" => $p);
	$i = 0;


	if ($i == 0) {
		foreach ($data as $dk => $dv) {
			if (empty($dv)) {
				$i++;
				echo $dk;
				echo "<br>";
			}
		}
		$sel = "select * from student where stu_name='$u' and  stu_pass='$p'";
		$logq = $con->query($sel);
		$nm = $logq->num_rows;
		if ($nm > 0) {
			$ff = $logq->fetch_object();
			// $nmm=$ff->Status;
			// if($nmm=="Active")
			// {
			// $role = $ff->Role;
			// if ($role == "Student") {
				session_start();
				$_SESSION['user'] = $ff->stu_name;
				$_SESSION['userid'] = $ff->stu_id;

				header("location:stu_home.php");
			// // } 
			// // elseif ($role == "Teacher") {
			// // 	session_start();
			// 	$_SESSION['user'] = $ff->t_name;
			// 	$_SESSION['userid'] = $ff->t_id;

			// 	header("location:tech_home.php");
			// }else
			// {
			// 	$msg="You are Not Student Or Teacher ..!!";
			// }

			// }
			// else
			// {
			// 	$msg="You are Blocked..!!";
			// }
		} else {
			$msg = "Wrong username and Password..!!";
		}
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Register Form</title>
</head>

<body>
	<h1 align="center">Login Form</h1>
	<h3 align="right"><a href="reg.php">Register Here</a></h3>
	<h3 align="center">
		<?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
	</h3>
	<form method="post">
		<table border="1" align="center">
			<tr>
				<td>Username :</td>
				<td><input type="text" name="unm"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="log_sub" value="Send"></td>
			</tr>
		</table>
	</form>
</body>

</html>