<?php

require("stu_db.php");

if (isset($_REQUEST['data_sub'])) {
	$u = $_REQUEST['tnm'];
	$p = $_REQUEST['tpass'];
	@$g = $_REQUEST['tgen'];
	$age = $_REQUEST['tage'];
	$doj = $_REQUEST['tdoj'];
	$email = $_REQUEST['temail'];
	$mob = $_REQUEST['tmob'];
	$tdesig = $_REQUEST['tdesig'];
	@$ssub = $_REQUEST['sub'];
	@$im = implode(",", $ssub ?? []);
	$cty = $_REQUEST['city'];


	$data = array(
		"Plzz Fill Teacher Name" => $u,
		"Plzz Fill Password" => $p,
		"Plzz Select Gender" => $g,
		"Plzz Fill Age" => $age,
		"Plzz Select Date Of Birth" => $doj,
		"Plzz Fill Email" => $email,
		"Plzz Fill Mobile No" => $mob,
		"Plzz Fill Designation" => $tdesig,
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

		$ins = "insert into teacher(t_name,t_pass,t_gender,t_age,t_doj,t_email,t_mob,t_desig,t_subject,t_city)
		values('$u','$p','$g','$age','$doj','$email','$mob','$tdesig','$im','$cty')";

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
	<h1 align="center">Teacher Register Form</h1>
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
				<td>Teacher Name :</td>
				<td><input type="text" name="tnm"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="tpass"></td>
			</tr>
			<tr>
				<td>Gender :</td>
				<td><input type="radio" name="tgen" value="Male">Male
					<input type="radio" name="tgen" value="Female">Female
				</td>
			</tr>
            <tr>
				<td>Age :</td>
				<td><input type="number" name="tage"></td>
			</tr>
			<tr>
				<td>Date Of join :</td>
				<td><input type="date" name="tdoj"></td>
			</tr>
			<tr>
				<td>Email Id :</td>
				<td><input type="text" name="temail"></td>
			</tr>
			<tr>
				<td>Mobile No :</td>
				<td><input type="text" name="tmob"></td>
			</tr>
			<tr>
				<td>Designation :</td>
				<td><input type="text" name="tdesig"></td>
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