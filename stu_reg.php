<?php

require("stu_db.php");

if (isset($_REQUEST['data_sub'])) {
	$u = $_REQUEST['snm'];
	$p = $_REQUEST['pass'];
	@$g = $_REQUEST['gen'];
	$dob = $_REQUEST['dob'];
	$email = $_REQUEST['email'];
	$mob = $_REQUEST['mob'];
	$fmob = $_REQUEST['fmob'];
	$std = $_REQUEST['std'];
	@$ssub = $_REQUEST['sub'];
	@$im = implode(",", $ssub ?? []);
	$cty = $_REQUEST['city'];


	$data = array(
		"Plzz Fill Student Name" => $u,
		"Plzz Fill Password" => $p,
		"Plzz Select Gender" => $g,
		"Plzz Select Date Of Birth" => $dob,
		"Plzz Fill Email" => $email,
		"Plzz Fill Mobile No" => $mob,
		"Plzz Fill Father Mobile No" => $fmob,
		"Plzz Fill S.T.D" => $std,
		"Plzz Select Subject" => $im,
		"Plzz Select City" => $cty

	);

	$i = 0;

	foreach ($data as $dk => $dv) {
		if (empty($dv)) {
			$i++;
			echo $dk;
			echo "<br>";
		}
	}

	if ($i == 0) {

		$ins = "insert into student(stu_name,stu_pass,stu_gender,stu_dob,stu_email,stu_mobile,stu_fmobile,stu_std,stu_sub,stu_city)
		values('$u','$p','$g','$dob','$email','$mob','$fmob','$std','$im','$cty')";

		$qq = $con->query($ins);

		if ($qq == true) {
			$msg = "Succefully Inserted..!!";
			// header("location:index.php");
		} else {
			$msg = "Something Is Wrong..!!";
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
	<h1 align="center">Student Register Form</h1>
	<h3 align="right"><a href="index.php">Login Here</a></h3>
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
				<td>Student Name :</td>
				<td><input type="text" name="snm"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td>Gender :</td>
				<td><input type="radio" name="gen" value="Male">Male
					<input type="radio" name="gen" value="Female">Female
				</td>
			</tr>
			<tr>
				<td>Date Of Birth :</td>
				<td><input type="date" name="dob"></td>
			</tr>
			<tr>
				<td>Email Id :</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Mobile No :</td>
				<td><input type="text" name="mob"></td>
			</tr>
			<tr>
				<td>Father Mobile No :</td>
				<td><input type="text" name="fmob"></td>
			</tr>
			<tr>
				<td>S.T.D :</td>
				<td><input type="number" name="std"></td>
			</tr>
			<tr>
				<td>Subject :</td>
				<td>
					<input type="checkbox" name="sub[]" value="Science">Science<br>
					<input type="checkbox" name="sub[]" value="Mathematics">Mathematics<br>
					<input type="checkbox" name="sub[]" value="Art">Art<br>
					<input type="checkbox" name="sub[]" value="English">English<br>
					<input type="checkbox" name="sub[]" value="Social_studies">Social studies<br>
					<input type="checkbox" name="sub[]" value="Chemistry">Chemistry<br>
					<input type="checkbox" name="sub[]" value="Physics">Physics
				</td>
			</tr>
			<tr>
				<td>City :</td>
				<td><select name="city">
						<?php
						$sel = "select * from city";
						$cq = $con->query($sel);
						while ($cf = $cq->fetch_object()) {
						?>
							<option value="<?php echo $cf->cty_id; ?>"><?php echo $cf->cty_name; ?></option>
						<?php
						}
						?>
					</select></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="data_sub" value="Send"></td>
			</tr>
		</table>
	</form>
</body>

</html>