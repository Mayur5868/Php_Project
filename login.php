<?php
require("stu_db.php");
session_start();

if (isset($_REQUEST['tp_sub'])) {
    $u = $_REQUEST['unm'];
    $p = $_REQUEST['pass'];
    $rol = $_REQUEST['rol'];
    $data = array("Enter your Username..!!" => $u, "Enter Your Password..!!" => $p, "Select your role..!!" => $rol);
    $i = 0;


    if ($i == 0) {
        foreach ($data as $dk => $dv) {
            if (empty($dv)) {
                $i++;
                echo $dk;
                echo "<br>";
            }
        }
        // $sel = "select * from teacher , principal where (teacher.t_pass='$p' and teacher.t_name='$u') or (principal.p_name='$u' and principal.p_pass='$p') ";
        $sel = "select t_name,t_pass from teacher where t_name='$u' and t_pass='$p' UNION select p_name,p_pass from principal where p_name='$u' and p_pass='$p'";
        $logq = $con->query($sel);
        $nm = $logq->num_rows;
        if ($nm > 0) {
            $ff = $logq->fetch_object();
            // $nmm=$ff->Status;
            // if($nmm=="Active")
            // {
            
            if ( $rol == "Principal") 
            {
                session_start();
                $_SESSION['user'] = $ff->p_name;
                $_SESSION['userid'] = $ff->p_id;


                header("location:prin_home.php");
            }
            elseif ( $rol =="Teacher" ) {
                session_start();
                $_SESSION['user'] = $ff->t_name;
                $_SESSION['userid'] = $ff->t_id;

                header("location:tech_home.php");
            } else {
                $msg = "You Can't Regiter data";
            }



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
    <h3 align="right"><a href="tech_reg.php">Register Here</a></h3>
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
                <td>Role</td>
                <td>
                    <select name="rol">
                        <option value="" selected="selected">Select Role</option>
                        <option value="Principal">Principal</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="tp_sub" value="Send"></td>
            </tr>
        </table>
    </form>
</body>

</html>