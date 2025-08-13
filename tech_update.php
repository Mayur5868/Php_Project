<?php
require("stu_db.php");

if (isset($_REQUEST['edt'])) {
    $id = $_REQUEST['edt'];
    $sel = "select * from teacher where t_id='$id'";
    $qq = $con->query($sel);
    $ed = $qq->fetch_object();

    if (isset($_REQUEST['upd_sub'])) {
        $u = $_REQUEST['tnm'];
        $p = $_REQUEST['tpass'];
        @$g = $_REQUEST['tgen'];
        $age = $_REQUEST['tage'];
        $doj = $_REQUEST['tdoj'];
        $email = $_REQUEST['temail'];
        $mob = $_REQUEST['tmob'];
        $tdesig = $_REQUEST['tdesig'];
        @$ssub = $_REQUEST['sub'];
        @$im = implode(",", $ssub);
        $cty = $_REQUEST['city'];


        $upd = "update teacher set t_name='$u',t_pass='$p',t_gender='$g',t_age='$age',t_doj='$doj',t_email='$email',t_mob='$mob',t_desig='$tdesig',t_subject='$im',t_city='$cty' where t_id='$id'";
        $con->query($upd);
        header("location:tech_home.php");
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
                <td>Teacher Name :</td>
                <td><input type="text" name="tnm" value="<?php echo $ed->t_name; ?>"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="tpass" value="<?php echo $ed->t_pass; ?>"></td>
            </tr>
            <tr>
                <td>Gender :</td>
                <td><input type="radio" name="tgen" <?php
                                                    if ($ed->t_gender == "Male") {
                                                        echo "checked='checked'";
                                                    }
                                                    ?> value="Male">Male
                    <input type="radio" name="tgen" <?php
                                                    if ($ed->t_gender == "Female") {
                                                        echo "checked='checked'";
                                                    }
                                                    ?> value="Female">Female
                </td>
            </tr>
            <tr>
				<td>Age :</td>
				<td><input type="number" name="tage" value="<?php echo $ed->t_age; ?>"></td>
			</tr>
            <tr>
				<td>Date Of join :</td>
				<td><input type="date" name="tdoj" value="<?php echo $ed->t_doj; ?>"></td>
			</tr>
			<tr>
				<td>Email Id :</td>
				<td><input type="text" name="temail" value="<?php echo $ed->t_email; ?>"></td>
			</tr>
			<tr>
				<td>Mobile No :</td>
				<td><input type="text" name="tmob" value="<?php echo $ed->t_mob; ?>"></td>
			</tr>
			<tr>
				<td>Designation :</td>
				<td><input type="text" name="tdesig" value="<?php echo $ed->t_desig; ?>"></td>
			</tr>
            <tr>
                <td>Subject :</td>
                <?php
                $hb = $ed->t_subject;
                $ex = explode(",", $hb);
                ?>
                <td><input type="checkbox" name="sub[]"
                        <?php
                        if (in_array("Science", $ex)) {
                            echo "checked='checked'";
                        }
                        ?>
                        value="Science">Science
                    <input type="checkbox" name="sub[]"
                        <?php
                        if (in_array("Mathematics", $ex)) {
                            echo "checked='checked'";
                        }
                        ?>
                        value="Mathematics">Mathematics
                    <input type="checkbox" name="sub[]"
                        <?php
                        if (in_array("Art", $ex)) {
                            echo "checked='checked'";
                        }
                        ?>
                        value="Art">Art
                    <input type="checkbox" name="sub[]"
                        <?php
                        if (in_array("English", $ex)) {
                            echo "checked='checked'";
                        }
                        ?>
                        value="English">English
                        <input type="checkbox" name="sub[]"
                        <?php
                        if (in_array("Social_studies", $ex)) {
                            echo "checked='checked'";
                        }
                        ?>
                        value="Social_studies">Social_studies
                    <input type="checkbox" name="sub[]"
                        <?php
                        if (in_array("Chemistry", $ex)) {
                            echo "checked='checked'";
                        }
                        ?>
                        value="Chemistry">Chemistry
                    <input type="checkbox" name="sub[]"
                        <?php
                        if (in_array("Physics", $ex)) {
                            echo "checked='checked'";
                        }
                        ?>
                        value="Physics">Physics
                </td>
            </tr>
            <tr>
                <td>City :</td>
                <td><select name="city">
                        <?php
                        $sel = "select * from city";
                        $qq = $con->query($sel);
                        while ($ff = $qq->fetch_object()) {
                            if ($ed->t_city == $ff->cty_id) {
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