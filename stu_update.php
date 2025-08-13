<?php
require("stu_db.php");

if (isset($_REQUEST['stuedt'])) {
    $id = $_REQUEST['stuedt'];
    $sel = "select * from student where stu_id='$id'";
    $qq = $con->query($sel);
    $ed = $qq->fetch_object();

    if (isset($_REQUEST['upd_sub'])) {
        $u = $_REQUEST['snm'];
        $p = $_REQUEST['pass'];
        @$g = $_REQUEST['gen'];
        $dob = $_REQUEST['dob'];
        $email = $_REQUEST['email'];
        $mob = $_REQUEST['mob'];
        $fmob = $_REQUEST['fmob'];
        $std = $_REQUEST['std'];
        @$ssub = $_REQUEST['sub'];
        @$im = implode(",", $ssub);
        $cty = $_REQUEST['city'];


        $upd = "update student set stu_name='$u',stu_pass='$p',stu_gender='$g',stu_dob='$dob',stu_email='$email',stu_mobile='$mob',stu_fmobile='$fmob',stu_std='$std',stu_sub='$im',stu_city='$cty' where stu_id='$id'";
        $con->query($upd);
        header("location:tech_home.php");
    }
}

if (isset($_REQUEST['edt'])) {
    $id = $_REQUEST['edt'];
    $sel = "select * from student where stu_id='$id'";
    $qq = $con->query($sel);
    $ed = $qq->fetch_object();

    if (isset($_REQUEST['upd_sub'])) {
        $u = $_REQUEST['snm'];
        $p = $_REQUEST['pass'];
        @$g = $_REQUEST['gen'];
        $dob = $_REQUEST['dob'];
        $email = $_REQUEST['email'];
        $mob = $_REQUEST['mob'];
        $fmob = $_REQUEST['fmob'];
        $std = $_REQUEST['std'];
        @$ssub = $_REQUEST['sub'];
        @$im = implode(",", $ssub);
        $cty = $_REQUEST['city'];


        $upd = "update student set stu_name='$u',stu_pass='$p',stu_gender='$g',stu_dob='$dob',stu_email='$email',stu_mobile='$mob',stu_fmobile='$fmob',stu_std='$std',stu_sub='$im',stu_city='$cty' where stu_id='$id'";
        $con->query($upd);
        header("location:stu_home.php");
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
                <td>Student Name :</td>
                <td><input type="text" name="snm" value="<?php echo $ed->stu_name; ?>"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="pass" value="<?php echo $ed->stu_pass; ?>"></td>
            </tr>
            <tr>
                <td>Gender :</td>
                <td><input type="radio" name="gen" <?php
                                                    if ($ed->stu_gender == "Male") {
                                                        echo "checked='checked'";
                                                    }
                                                    ?> value="Male">Male
                    <input type="radio" name="gen" <?php
                                                    if ($ed->stu_gender == "Female") {
                                                        echo "checked='checked'";
                                                    }
                                                    ?> value="Female">Female
                </td>
            </tr>
            <tr>
                <td>Date Of Brith :</td>
                <td><input type="date" name="dob" value="<?php echo $ed->stu_dob; ?>"></td>
            </tr>
            <tr>
                <td>Email Id :</td>
                <td><input type="text" name="email" value="<?php echo $ed->stu_email; ?>"></td>
            </tr>
            <tr>
                <td>Mobile No :</td>
                <td><input type="text" name="mob" value="<?php echo $ed->stu_mobile; ?>"></td>
            </tr>
            <tr>
                <td>Father Mobile No :</td>
                <td><input type="number" name="fmob" value="<?php echo $ed->stu_fmobile; ?>"></td>
            </tr>
            <tr>
                <td>S.T.D : :</td>
                <td><input type="text" name="std" value="<?php echo $ed->stu_std; ?>"></td>
            </tr>
            <tr>
                <td>Subject :</td>
                <?php
                $hb = $ed->stu_sub;
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
                            if ($ed->stu_city == $ff->cty_id) {
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