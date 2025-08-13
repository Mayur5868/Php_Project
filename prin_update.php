<?php
require("stu_db.php");

if (isset($_REQUEST['edt'])) {
    $id = $_REQUEST['edt'];
    $sel = "select * from principal where p_id='$id'";
    $qq = $con->query($sel);
    $ed = $qq->fetch_object();

    if (isset($_REQUEST['upd_sub'])) {
        $u = $_REQUEST['pnm'];
        $p = $_REQUEST['ppass'];
        @$g = $_REQUEST['pgen'];
        $age = $_REQUEST['page'];
        $doj = $_REQUEST['pdoj'];
        $email = $_REQUEST['pemail'];
        $mob = $_REQUEST['pmob'];
        $cty = $_REQUEST['city'];


        $upd = "update principal set p_name='$u',p_pass='$p',p_gender='$g',p_age='$age',p_doj='$doj',p_email='$email',p_mobile='$mob',city='$cty' where p_id='$id'";
        $con->query($upd);
        header("location:prin_home.php");
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Form</title>
</head>

<body>
    <h1 align="center">Update Form</h1>
    <h3 align="center"></h3>
    <form method="post">
        <table border="1" align="center">
            <tr>
                <td>Principal Name :</td>
                <td><input type="text" name="pnm" value="<?php echo $ed->p_name; ?>"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="ppass" value="<?php echo $ed->p_pass; ?>"></td>
            </tr>
            <tr>
                <td>Gender :</td>
                <td><input type="radio" name="pgen" <?php
                                                    if ($ed->p_gender == "Male") {
                                                        echo "checked='checked'";
                                                    }
                                                    ?> value="Male">Male
                    <input type="radio" name="pgen" <?php
                                                    if ($ed->p_gender == "Female") {
                                                        echo "checked='checked'";
                                                    }
                                                    ?> value="Female">Female
                </td>
            </tr>
            <tr>
				<td>Age :</td>
				<td><input type="number" name="page" value="<?php echo $ed->p_age; ?>"></td>
			</tr>
            <tr>
				<td>Date Of join :</td>
				<td><input type="date" name="pdoj" value="<?php echo $ed->p_doj; ?>"></td>
			</tr>
			<tr>
				<td>Email Id :</td>
				<td><input type="text" name="pemail" value="<?php echo $ed->p_email; ?>"></td>
			</tr>
			<tr>
				<td>Mobile No :</td>
				<td><input type="text" name="pmob" value="<?php echo $ed->p_mobile; ?>"></td>
			</tr>
            <tr>
                <td>City :</td>
                <td><select name="city">
                        <?php
                        $sel = "select * from city";
                        $qq = $con->query($sel);
                        while ($ff = $qq->fetch_object()) {
                            if ($ed->city == $ff->cty_id) {
                        ?>
                                <option selected value="<?php echo $ff->cty_id; ?>"><?php echo $ff->cty_name; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $ff->cty_id; ?>"><?php echo $ff->cty_name; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center"><input type="submit" name="upd_sub" value="Send"></td>
            </tr>
        </table>
    </form>
</body>

</html>