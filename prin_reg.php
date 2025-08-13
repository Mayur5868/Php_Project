<?php

require("stu_db.php");

if (isset($_REQUEST['data_sub'])) {
	$u = $_REQUEST['pnm'];
	$p = $_REQUEST['ppass'];
	@$g = $_REQUEST['pgen'];
	$age = $_REQUEST['page'];
	$doj = $_REQUEST['pdoj'];
	$email = $_REQUEST['pemail'];
	$mob = $_REQUEST['pmob'];
	$cty = $_REQUEST['city'];


	$data = array(
		"Plzz Fill Principal Name" => $u,
		"Plzz Fill Password" => $p,
		"Plzz Select Gender" => $g,
		"Plzz Fill Age" => $age,
		"Plzz Select Date Of Join" => $doj,
		"Plzz Fill Email" => $email,
		"Plzz Fill Mobile No" => $mob,
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

		$ins = "insert into principal(p_name,p_pass,p_gender,p_age,p_doj,p_email,p_mobile,city)
		values('$u','$p','$g','$age','$doj','$email','$mob','$cty')";

		$qq = $con->query($ins);

		if ($qq == true) {
			$msg = "Succefully Inserted..!!";
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
	<h1 align="center">Principal Register Form</h1>
	<h3 align="right"><a href="index.php">Login Here</a></h3>
	<h3 align="center">
		<?php
		if (isset($msg)) {
			echo $msg;
		}
		// header("location:index.php");
		?>
	</h3>
	<form method="post">
		<table border="1" align="center">
			<tr>
				<td>Principal Name :</td>
				<td><input type="text" name="pnm"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="ppass"></td>
			</tr>
			<tr>
				<td>Gender :</td>
				<td><input type="radio" name="pgen" value="Male">Male
					<input type="radio" name="pgen" value="Female">Female
				</td>
			</tr>
			<tr>
				<td>Age :</td>
				<td><input type="number" name="page"></td>
			</tr>
			<tr>
				<td>Date Of join :</td>
				<td><input type="date" name="pdoj"></td>
			</tr>
			<tr>
				<td>Email Id :</td>
				<td><input type="text" name="pemail"></td>
			</tr>
			<tr>
				<td>Mobile No :</td>
				<td><input type="text" name="pmob"></td>
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