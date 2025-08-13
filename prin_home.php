<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
</head>
<body>
<?php

require("stu_db.php");
session_start();

// Single Delete code

if (isset($_REQUEST['studel'])) {
    $id = $_REQUEST['studel'];
    $del = "delete from student where stu_id='$id'";
    $con->query($del);
    header("location:prin_home.php");
}

if (isset($_REQUEST['techdel'])) {
    $id = $_REQUEST['techdel'];
    $del = "delete from teacher where t_id='$id'";
    $con->query($del);
    header("location:prin_home.php");
}


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


//multiple delete code

if (isset($_REQUEST['mul_stu'])) {
    $ch = $_REQUEST['stu'];
    foreach ($ch as $cv) {
        $del = "delete from student where stu_id='$cv'";
        $con->query($del);
    }
    header("location:prin_home.php");
}

if (isset($_REQUEST['mul_tech'])) {
    $ch = $_REQUEST['tech'];
    foreach ($ch as $cv) {
        $del = "delete from teacher where t_id='$cv'";
        $con->query($del);
    }
    header("location:prin_home.php");
}
?>


<body>
    <h1 align="center">Welcome Mr.Den</h1>
    <h3 align="center"><?php
                        if (isset($_SESSION['user'])) {
                            echo "Welcome " . $_SESSION['user'];
                        } else {
                            header("location:prin_login.php");
                        }
                        ?></h3>
    <h3 align="right"><a href="logout.php">Logout</a></h3>
    <h3 align="right"><a href="stu_reg.php">Student Regiter</a></h3>
    <h3 align="right"><a href="tech_reg.php">Techer Regiter</a></h3>
    <form method="post">
    <h1>Principal Data</h1>
        <table border="1" align="center">
            <tr>
                <!-- <td>#</td> -->
                <td>no.</td>
                <td>Name</td>
                <td>Password</td>
                <td>Gender</td>
                <td>Age</td>
                <td>D.O.j</td>
                <td>Email Id</td>
                <td>Mobile No</td>
                <td>City</td>
                <td colspan="3" align="center">Action</td>
            </tr>
            <?php
            $sel = "select * from principal join city on principal.city=city.cty_id where p_id='" . $_SESSION['userid'] . "'";
            $qq = $con->query($sel);
            while ($ff = $qq->fetch_object()) {
            ?>
                <tr>
                    <!-- <td><input type="checkbox" name="hh[]" value="<?php echo $ff->p_id; ?>"></td> -->
                    <td><?php echo $ff->p_id; ?></td>
                    <td><?php echo $ff->p_name; ?></td>
                    <td><?php echo $ff->p_pass; ?></td>
                    <td><?php echo $ff->p_gender; ?></td>
                    <td><?php echo $ff->p_age; ?></td>
                    <td><?php echo $ff->p_doj; ?></td>
                    <td><?php echo $ff->p_email; ?></td>
                    <td><?php echo $ff->p_mobile; ?></td>
                    <td><?php echo $ff->cty_name; ?></td>
                    <td><a href="prin_update.php?edt=<?php echo $ff->p_id; ?>">Edit</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>

    <form method="post">
        <h1>Teacher Data</h1>
        <table border="1" align="center">
            <tr>
                <td>#</td>
                <td>no.</td>
                <td>Name</td>
                <td>Password</td>
                <td>Gender</td>
                <td>Age</td>
                <td>D.O.j</td>
                <td>Email Id</td>
                <td>Mobile No</td>
                <td>Designation</td>
                <td>Subject</td>
                <td>City</td>
                <td>Role</td>
                <td colspan="3" align="center">Action</td>
            </tr>
            <?php
            $sel = "select * from teacher join city on teacher.t_city=city.cty_id";
            $qq = $con->query($sel);
            while ($ff = $qq->fetch_object()) {
            ?>
                <tr>
                    <td><input type="checkbox" name="tech[]" value="<?php echo $ff->t_id; ?>"></td>
                    <td><?php echo $ff->t_id; ?></td>
                    <td><?php echo $ff->t_name; ?></td>
                    <td><?php echo $ff->t_pass; ?></td>
                    <td><?php echo $ff->t_gender; ?></td>
                    <td><?php echo $ff->t_age; ?></td>
                    <td><?php echo $ff->t_doj; ?></td>
                    <td><?php echo $ff->t_email; ?></td>
                    <td><?php echo $ff->t_mob; ?></td>
                    <td><?php echo $ff->t_desig; ?></td>
                    <td><?php echo $ff->t_subject; ?></td>
                    <td><?php echo $ff->cty_name; ?></td>
                    <td><a href="prin_home.php?techdel=<?php echo $ff->t_id; ?>">Delete</a></td>
                    <!-- <td><a href="tech_update.php?edt=<?php echo $ff->t_id; ?>">Edit</a></td> -->
                    <!-- <td><a href="tech_home.php?sts=<?php echo $ff->t_id; ?>"><?php echo $ff->Status; ?></a></td> -->
                </tr>
            <?php
            }
            ?>
             <tr>
                <td align="center" colspan="16"><input type="submit" name="mul_tech" value="Delete"></td>
            </tr>
        </table>
    </form>

    <form metho. d="post">
        <h1>Student Data</h1>
        <table border="1" align="center">
            <tr>
                <td>#</td>
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
            // $sel = "select * from student join city on student.stu_city=city.cty_id where stu_id='" . $_SESSION['userid'] . "'";
            $sel = "select * from student join city on student.stu_city=city.cty_id";
            $qq = $con->query($sel);
            while ($ff = $qq->fetch_object()) {
            ?>
                <tr>
                    <td><input type="checkbox" name="stu[]" value="<?php echo $ff->stu_id; ?>"></td>
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
                    <td><a href="prin_home.php?studel=<?php echo $ff->stu_id; ?>">Delete</a></td>
                    <!-- <td><a href="stu_update.php?pedt=<?php echo $ff->stu_id; ?>">Edit</a></td> -->
                    <!-- <td><a href="home.php?sts=<?php echo $ff->uid; ?>"><?php echo $ff->Status; ?></a></td> -->
                </tr>
            <?php
            }
            ?>
            <tr>
                <td align="center" colspan="16"><input type="submit" name="mul_stu" value="Delete"></td>
            </tr>
        </table>
    </form>

</body>
</html>