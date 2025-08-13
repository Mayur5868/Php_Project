<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>School Management System</title>

	<!-- Bootstrap 4 CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


	<style>
		* {
			margin: 0;
			padding: 0;
		}

		body {
			background-image: url("https://img.freepik.com/free-vector/abstract-secure-technology-background_23-2148357087.jpg?t=st=1704160688~exp=1704161288~hmac=b37f6a9bb894ee4655cd411712309f6507644a1de23f709e5dfc0c33ed33bb15");
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			overflow: hidden;
			height: 100vh;
			color:white;
		}

		.main {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: rgba(0, 0, 0, 0.4);
			height: 100vh;
		}

		.login-container,
		.registration-container {
			width: 500px;
			box-shadow: rgba(255, 255, 255, 0.24) 0px 3px 8px;
			border-radius: 10px;
			background-color: rgba(0, 0, 0, 0.7);
			padding: 30px;
			color: rgb(255, 255, 255);
		}

		.title-container>h1 {
			font-size: 90px !important;
			color: rgb(255, 255, 255);
			text-shadow: 2px 4px 2px rgba(200, 200, 200, 0.6);
		}

		.show-form {
			color: rgb(100, 100, 200);
			text-decoration: underline;
			cursor: pointer;
		}

		.show-form:hover {
			color: rgb(100, 100, 255);
		}
	</style>
</head>

<body>
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
					// echo  "<script>alert('$dk');</script>";
					echo "<br>";
				}
			}
			$sel = "select * from principal where p_name='$u' and p_pass='$p' ";
			$logq = $con->query($sel);
			$nm = $logq->num_rows;
			if ($nm > 0) {
				$ff = $logq->fetch_object();
				// $nmm=$ff->Status;
				// if($nmm=="Active")
				// {


				session_start();
				$_SESSION['user'] = $ff->p_name;
				$_SESSION['userid'] = $ff->p_id;

				header("location:prin_home.php");


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


	<body>
		<!-- <h1 align="center">Login Form</h1> -->
		<!-- <h3 align="right"><a href="prin_reg.php">Register Here</a></h3> -->
		<h3 align="center">
			<?php
			if (isset($msg)) {
				// echo $msg;
				echo "<script>alert('$msg');</script>";
			}
			?>
		</h3>
		<div class="main row">

			<div class="title-container col-6">
				<h1>School Management System</h1>
			</div>

			<div class="main-container col-4">
				<!-- Login Form -->
				<div class="login-container" id="loginForm">
					<h2 class="text-center">Welcome Back!</h2>
					<p class="text-center">Please enter your login details.</p>
					<div class="login-form">
						<form method="POST">
							<div class="form-group">
								<label for="username">Username:</label>
								<input type="text" class="form-control" id="username" name="unm" required>
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="password" name="pass" required>
							</div>

							<div class="row m-auto">
								<div class="form-group form-check col-6">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Remember Password</label>
								</div>
								<!-- <small class="show-form col-6 text-center pl-4" onclick="showForm()">No Account? Register Here.</small> -->
							</div>

							<button type="submit" class="btn btn-primary login-btn form-control" name="log_sub">Login</button>
						</form>
					</div>
				</div>

				<!-- <form method="post">
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
				</form> -->

	</body>

</html>