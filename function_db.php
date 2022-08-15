<?php
session_start();
$_SESSION["dp"] = "images/dp.png";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "db.php";

function mailTo($to, $user, $subject, $body, $success, $error)
{

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'projectdemo1310@gmail.com';
        $mail->Password = 'Projectdemo@2309';
        $mail->SMTPSecure = 'tls';
        $mail->Port    = 587;

        $mail->setFrom('saimatrimony@gmail.com', 'onlinematrimony');
        $mail->addAddress($to, $user);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        if ($mail->send()) {
            header($success);
        }
    } catch (Exception $e) {

        header($error);
    }
}

// To store Registration information
if (isset($_POST["reg_submit"])) {
    $_SESSION['reg_name'] = $_POST['reg_name'];
    $_SESSION['reg_mail'] = $_POST['reg_mail'];
    $_SESSION['reg_pass'] = $_POST['reg_pass'];
    $chk_user = $_POST['reg_name'];
    $chk_mail = $_POST['reg_mail'];
    if ($chk_user == "admin") {
        header("Location: registrationpage.php?error=Invalid username you cannot use the username as admin!");
    } elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $chk_mail)) {
        header("Location: registrationpage.php?error=Invalid E-mail address!");
    } else if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username='$chk_user' OR email='$chk_mail'")) > 0) {
        header("Location: registrationpage.php?error=user already exists!");
    } else {
        header("Location: info.php");
    }
}

// To validate the Login information
if (isset($_POST['log_submit'])) {
    $log_user = mysqli_real_escape_string($conn, $_POST['log_name']);
    $log_pass = mysqli_real_escape_string($conn, $_POST['log_pass']);
    $log_run = mysqli_query($conn, "SELECT * FROM user WHERE (username='$log_user' OR email='$log_user') AND (password='$log_pass')");
    if (mysqli_num_rows($log_run) == 1) {
        $_SESSION["log"] = $log_user;
        $user_in = mysqli_fetch_assoc($log_run);
        $_SESSION["my_id"] = $user_in["user_id"];
        $_SESSION["my_status"] = $user_in["status"];
        $_SESSION["my_email"] = $user_in["email"];
        $_SESSION["pass"] = $user_in["password"];
        $_SESSION["name"] = $user_in["firstname"] . " " . $user_in["lastname"];

        if ($_SESSION["log"] == "admin" or $_SESSION["log"] == "matrimonybka@gmail.com") {
            if (isset($_POST["remember"]) && ($_POST["remember"] == 1)) {
                setcookie('email', $_SESSION["log"], time() + (7 * 60 * 60 * 24));
                setcookie('pass', $_SESSION["pass"], time() + (7 * 60 * 60 * 24));
            } else {
                setcookie('email', '');
                setcookie('pass', '');
            }
            header("Location: admin.php");
        } else {
            if (isset($_POST["remember"]) && ($_POST["remember"] == 1)) {
                setcookie('email', $_SESSION["log"], time() + (7 * 60 * 60 * 24));
                setcookie('pass', $_SESSION["pass"], time() + (7 * 60 * 60 * 24));
            } else {
                setcookie('email', '');
                setcookie('pass', '');
            }
            header("Location: userhome.php");
        }
    } else {
        setcookie('email', '');
        setcookie('pass', '');
        header("Location: loginpage.php?error=Invalid username or password!");
    }
}

//send mail to user
if (isset($_POST["info_sub"])) {

    $otp = rand(10000, 99999);
    $_SESSION["otp"] = $otp;
    mailTo($_SESSION['reg_mail'], $_SESSION['reg_name'], 'Registration Verification!', 'Welcome ' . $_SESSION['reg_name'] . ' to Online matrimonial website.<br><br>OTP verification code is: ' . $otp, "Location:otp.php?msg=Successfully OTP sent!", "Location: registrationpage.php?error=Unable to send Mail");

    $_SESSION["first"] = mysqli_real_escape_string($conn, $_POST['fi_name']);
    $_SESSION["last"] = mysqli_real_escape_string($conn, $_POST['l_name']);
    $_SESSION["dob"] = mysqli_real_escape_string($conn, $_POST['dob']);
    $_SESSION["age"] = mysqli_real_escape_string($conn, $_POST['age']);
    $_SESSION["gender"] = mysqli_real_escape_string($conn, $_POST['gender']);
    $_SESSION["nationality"] = mysqli_real_escape_string($conn, $_POST['nation']);
    $_SESSION["rel"] = mysqli_real_escape_string($conn, $_POST['rel']);
    $_SESSION["cas"] = mysqli_real_escape_string($conn, $_POST['caste']);
    $_SESSION["ph_no"] = mysqli_real_escape_string($conn, $_POST['ph_no']);

    $targetDir = "uploads/";
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $_SESSION["img"] = $fileName;
            }
        }
    }
    $_SESSION["fName"] = mysqli_real_escape_string($conn, $_POST['f_name']);
    $_SESSION["mName"] = mysqli_real_escape_string($conn, $_POST['m_name']);
    $_SESSION["citizen"] = mysqli_real_escape_string($conn, $_POST['citizen']);
    $_SESSION["a_me"] = mysqli_real_escape_string($conn, $_POST['a_me']);
    $_SESSION["blood"] = mysqli_real_escape_string($conn, $_POST['b_grp']);
    $_SESSION["m_status"] = mysqli_real_escape_string($conn, $_POST['m_status']);
    $_SESSION["l_known"] = mysqli_real_escape_string($conn, $_POST['l_known']);
    $_SESSION["mton"] = mysqli_real_escape_string($conn, $_POST['m_ton']);
    $_SESSION["family_v"] = mysqli_real_escape_string($conn, $_POST['f_values']);
    $_SESSION["family_t"] = mysqli_real_escape_string($conn, $_POST['f_type']);
    $_SESSION["family_s"] = mysqli_real_escape_string($conn, $_POST['f_status']);
    $_SESSION["home_status"] = mysqli_real_escape_string($conn, $_POST['h_status']);
    $_SESSION["f_occ"] = mysqli_real_escape_string($conn, $_POST['f_occ']);
    $_SESSION["m_occ"] = mysqli_real_escape_string($conn, $_POST['m_occ']);
    $_SESSION["nob"] = mysqli_real_escape_string($conn, $_POST['nob']);
    $_SESSION["nob_m"] = mysqli_real_escape_string($conn, $_POST['nob_m']);
    $_SESSION["nos"] = mysqli_real_escape_string($conn, $_POST['nos']);
    $_SESSION["hei"] = mysqli_real_escape_string($conn, $_POST['height']);
    $_SESSION["wei"] = mysqli_real_escape_string($conn, $_POST['weight']);
    $_SESSION["physical"] = mysqli_real_escape_string($conn, $_POST['p_status']);
    $_SESSION["body"] = mysqli_real_escape_string($conn, $_POST['b_type']);
    $_SESSION["complexion"] = mysqli_real_escape_string($conn, $_POST['color']);
    $_SESSION["food"] = mysqli_real_escape_string($conn, $_POST['food']);
    $_SESSION["smoke"] = mysqli_real_escape_string($conn, $_POST['s_habit']);
    $_SESSION["drink"] = mysqli_real_escape_string($conn, $_POST['d_habit']);
    $_SESSION["hobby"] = mysqli_real_escape_string($conn, $_POST['hobby']);
    $_SESSION["edu"] = mysqli_real_escape_string($conn, $_POST['edu']);
    $_SESSION["employment"] = mysqli_real_escape_string($conn, $_POST['employ']);
    $_SESSION["profession"] = mysqli_real_escape_string($conn, $_POST['profession']);
    $_SESSION["annual"] = mysqli_real_escape_string($conn, $_POST['income']);
    $_SESSION["job_company"] = mysqli_real_escape_string($conn, $_POST['company']);
    $_SESSION["job_design"] = mysqli_real_escape_string($conn, $_POST['position']);
    $_SESSION["add"] = mysqli_real_escape_string($conn, $_POST['address']);
    $_SESSION["district"] = mysqli_real_escape_string($conn, $_POST['dist']);
    $_SESSION["state"] = mysqli_real_escape_string($conn, $_POST['state']);
    $_SESSION["pin_c"] = mysqli_real_escape_string($conn, $_POST['pcode']);
    $_SESSION["p_need"] = mysqli_real_escape_string($conn, $_POST['p_need']);
    $_SESSION["p_age"] = mysqli_real_escape_string($conn, $_POST['p_age']);
    $_SESSION["pm_status"] = mysqli_real_escape_string($conn, $_POST['p_status']);
    $_SESSION["p_rel"] = mysqli_real_escape_string($conn, $_POST['p_rel']);
    $_SESSION["p_cas"] = mysqli_real_escape_string($conn, $_POST['p_caste']);
    $_SESSION["p_mton"] = mysqli_real_escape_string($conn, $_POST['p_mton']);
    $_SESSION["p_profession"] = mysqli_real_escape_string($conn, $_POST['p_profession']);
}
//resent otp for registration
if (isset($_POST["re_otp"])) {
    mailTo($_SESSION['reg_mail'], $_SESSION['reg_name'], 'Registration Verification OTP Resent!', 'Welcome ' . $_SESSION['reg_name'] . ' to Online matrimonial website.<br><br>OTP verification code is: ' . $_SESSION["otp"], "Location:otp.php?msg=Successfully OTP Resent!", "Location: registrationpage.php?error=Unable to send Mail");
}

// mail sent for forget password
if (isset($_POST["f_sub"])) {
    $_SESSION["fmail"] = $_POST["f_email"];
    $fmail = $_SESSION["fmail"];
    $pass_upd = mysqli_query($conn, "SELECT * FROM user WHERE email = '$fmail'");
    if (mysqli_num_rows($pass_upd) == 1) {
        $fotp = rand(10000, 99999);
        $_SESSION["f_otp"] = $fotp;
        mailTo($fmail, "User", 'Verification!', 'Forget Password verification code is: ' . $fotp, "Location:f_otp.php?msg=OTP Successfully sent!", "Location: loginpage.php?error=Unable to send Mail!");
    } else {
        header("Location: loginpage.php?error=E-mail id not found!");
    }
}

// mail sent for resent otp forget password
if (isset($_POST["re_fotp"])) {
    $fmail = $_SESSION["fmail"];
    $pass_upd = mysqli_query($conn, "SELECT * FROM user WHERE email = '$fmail'");
    if (mysqli_num_rows($pass_upd) == 1) {
        mailTo($fmail, 'User', 'Verification!', 'Forget Password verification code is: ' . $_SESSION["f_otp"], "Location: f_otp.php?msg=OTP Successfully Resent!", "Location: loginpage.php?error=Unable to send Mail!");
    } else {
        header("Location: loginpage.php?error=E-mail id not found!");
    }
}

//checking otp for forget password
if (isset($_POST["fotp_sub"])) {
    if ($_SESSION["f_otp"] == $_POST["fu_otp"]) {
        header("Location: pass.php");
    } else {
        header("Location: f_otp.php?fotp_error=OTP not matched!");
    }
}

//update forget password
if (isset($_POST["fp_sub"])) {
    $fmail = $_SESSION["fmail"];
    $npass = $_POST["f_pass"];
    $cpass = $_POST["fc_pass"];
    if ($npass == $cpass) {
        $pass_upd = mysqli_query($conn, "UPDATE user SET password = '$npass' WHERE (email = '$fmail')");
        if ($pass_upd) {
            header("Location: index.php?error=Login with New password");
        }
    } else {
        header("Location: pass.php?msg=Password Mismatched!");
    }
}

//check otp 
if (isset($_POST["otp_submit"])) {
    if ($_SESSION["otp"] == $_POST["u_otp"]) {
        header("Location: plan.php");
    } else {
        header("Location: otp.php?otp_error=OTP not matched!");
    }
}


// To register the premium user details
if (isset($_POST["pre_user"])) {
    $chk_user = $_SESSION['reg_name'];
    $chk_mail = $_SESSION['reg_mail'];
    $chk_pass = $_SESSION['reg_pass'];
    $reg_run = mysqli_query($conn, "INSERT INTO user(username, email, password, firstname, lastname, dob, age, gender, nationality, religion, caste, phno, img, f_name, m_name, citizenship, a_me, b_group, m_status, l_known, m_ton, f_val, f_type, f_status, home, f_occ, m_occ, nob, nob_m, nos, height, weight, p_status, b_type, complexion, e_habits, s_habit, d_habit, hobby, h_edu, employ, post, a_income, l_comp, l_des, address, dist, state, p_code, p_need, p_age, pm_status, p_religion, p_caste, pm_ton, p_post, status) VALUES('$chk_user','$chk_mail','$chk_pass','{$_SESSION['first']}','{$_SESSION['last']}','{$_SESSION['dob']}','{$_SESSION['age']}','{$_SESSION['gender']}','{$_SESSION['nationality']}','{$_SESSION['rel']}','{$_SESSION['cas']}','{$_SESSION['ph_no']}','{$_SESSION['img']}','{$_SESSION['fName']}','{$_SESSION['mName']}','{$_SESSION['citizen']}','{$_SESSION['a_me']}','{$_SESSION['blood']}','{$_SESSION['m_status']}','{$_SESSION['l_known']}','{$_SESSION['mton']}','{$_SESSION['family_v']}','{$_SESSION['family_t']}','{$_SESSION['family_s']}','{$_SESSION['home_status']}','{$_SESSION['f_occ']}','{$_SESSION['m_occ']}','{$_SESSION['nob']}','{$_SESSION['nob_m']}','{$_SESSION['nos']}','{$_SESSION['hei']}','{$_SESSION['wei']}','{$_SESSION['physical']}','{$_SESSION['body']}','{$_SESSION['complexion']}','{$_SESSION['food']}','{$_SESSION['smoke']}','{$_SESSION['drink']}','{$_SESSION['hobby']}','{$_SESSION['edu']}','{$_SESSION['employment']}','{$_SESSION['profession']}','{$_SESSION['annual']}','{$_SESSION['job_company']}','{$_SESSION['job_design']}','{$_SESSION['add']}','{$_SESSION['district']}','{$_SESSION['state']}','{$_SESSION['pin_c']}','{$_SESSION['p_need']}','{$_SESSION['p_age']}','{$_SESSION['pm_status']}','{$_SESSION['p_rel']}','{$_SESSION['p_cas']}','{$_SESSION['p_mton']}','{$_SESSION['p_profession']}','P')");
    if ($reg_run) {
        $_SESSION["name"] = $_SESSION['first'] . " " . $_SESSION['last'];
        $_SESSION["my_status"] = "P";
        $_SESSION["my_email"] = $chk_mail;
        $run6 = mysqli_query($conn, "SELECT * FROM user WHERE email='$chk_mail'");
        $row6 = mysqli_fetch_assoc($run6);
        $_SESSION["my_id"] = $row6["user_id"];
        header("location: userhome.php");
    }
}

// To register the free user details
if (isset($_POST["f_user"])) {
    $chk_user = $_SESSION['reg_name'];
    $chk_mail = $_SESSION['reg_mail'];
    $chk_pass = $_SESSION['reg_pass'];
    $regf_run = mysqli_query($conn, "INSERT INTO user(username, email, password, firstname, lastname, dob, age, gender, nationality, religion, caste, phno, img, f_name, m_name, citizenship, a_me, b_group, m_status, l_known, m_ton, f_val, f_type, f_status, home, f_occ, m_occ, nob, nob_m, nos, height, weight, p_status, b_type, complexion, e_habits, s_habit, d_habit, hobby, h_edu, employ, post, a_income, l_comp, l_des, address, dist, state, p_code, p_need, p_age, pm_status, p_religion, p_caste, pm_ton, p_post, status) VALUES('$chk_user','$chk_mail','$chk_pass','{$_SESSION['first']}','{$_SESSION['last']}','{$_SESSION['dob']}','{$_SESSION['age']}','{$_SESSION['gender']}','{$_SESSION['nationality']}','{$_SESSION['rel']}','{$_SESSION['cas']}','{$_SESSION['ph_no']}','{$_SESSION['img']}','{$_SESSION['fName']}','{$_SESSION['mName']}','{$_SESSION['citizen']}','{$_SESSION['a_me']}','{$_SESSION['blood']}','{$_SESSION['m_status']}','{$_SESSION['l_known']}','{$_SESSION['mton']}','{$_SESSION['family_v']}','{$_SESSION['family_t']}','{$_SESSION['family_s']}','{$_SESSION['home_status']}','{$_SESSION['f_occ']}','{$_SESSION['m_occ']}','{$_SESSION['nob']}','{$_SESSION['nob_m']}','{$_SESSION['nos']}','{$_SESSION['hei']}','{$_SESSION['wei']}','{$_SESSION['physical']}','{$_SESSION['body']}','{$_SESSION['complexion']}','{$_SESSION['food']}','{$_SESSION['smoke']}','{$_SESSION['drink']}','{$_SESSION['hobby']}','{$_SESSION['edu']}','{$_SESSION['employment']}','{$_SESSION['profession']}','{$_SESSION['annual']}','{$_SESSION['job_company']}','{$_SESSION['job_design']}','{$_SESSION['add']}','{$_SESSION['district']}','{$_SESSION['state']}','{$_SESSION['pin_c']}','{$_SESSION['p_need']}','{$_SESSION['p_age']}','{$_SESSION['pm_status']}','{$_SESSION['p_rel']}','{$_SESSION['p_cas']}','{$_SESSION['p_mton']}','{$_SESSION['p_profession']}','F')");
    if ($regf_run) {
        $_SESSION["my_status"] = "F";
        $_SESSION["my_email"] = $chk_mail;
        $_SESSION["name"] = $_SESSION['first'] . " " . $_SESSION['last'];
        $run7 = mysqli_query($conn, "SELECT * FROM user WHERE email='$chk_mail'");
        $row7 = mysqli_fetch_assoc($run7);
        $_SESSION["my_id"] = $row7["user_id"];
        header("location: userhome.php");
    }
}

// To change the info of user
if (isset($_POST["chg_info_sub"])) {
    $myid = $_SESSION["my_id"];
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $targetDir = "uploads/";
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $img = $fileName;
                $sql = mysqli_query($conn, "UPDATE user SET firstname = '{$_POST['fi_name']}', lastname = '{$_POST['l_name']}', dob = '{$_POST['dob']}', age = '{$_POST['age']}', gender = '{$_POST['gender']}', nationality = '{$_POST['nation']}', religion = '{$_POST['rel']}', caste = '{$_POST['caste']}', phno = '{$_POST['ph_no']}', img = '$img', f_name = '{$_POST['f_name']}', m_name = '{$_POST['m_name']}', citizenship = '{$_POST['citizen']}', a_me = '{$_POST['a_me']}', b_group = '{$_POST['b_grp']}', m_status = '{$_POST['m_status']}', l_known = '{$_POST['l_known']}', m_ton = '{$_POST['m_ton']}', f_val = '{$_POST['f_values']}', f_type = '{$_POST['f_type']}', f_status = '{$_POST['f_status']}', home = '{$_POST['h_status']}', f_occ = '{$_POST['f_occ']}', m_occ = '{$_POST['m_occ']}', nob = '{$_POST['nob']}', nob_m = '{$_POST['nob_m']}', nos = '{$_POST['nos']}', height = '$height', weight = '{$_POST['weight']}', p_status = '{$_POST['p_status']}', b_type = '{$_POST['b_type']}', complexion = '{$_POST['color']}', e_habits = '{$_POST['food']}', s_habit = '{$_POST['s_habit']}', d_habit = '{$_POST['d_habit']}', hobby = '{$_POST['hobby']}', h_edu = '{$_POST['edu']}', employ = '{$_POST['employ']}', post = '{$_POST['profession']}', a_income = '{$_POST['income']}', l_comp = '{$_POST['company']}', l_des = '{$_POST['position']}', address = '{$_POST['address']}', dist = '{$_POST['dist']}', state = '{$_POST['state']}', p_code = '{$_POST['pcode']}', p_need = '{$_POST['p_need']}', p_age = '{$_POST['p_age']}', pm_status = '{$_POST['p_status']}', p_religion = '{$_POST['p_rel']}', p_caste = '{$_POST['p_caste']}', pm_ton = '{$_POST['p_mton']}', p_post = '{$_POST['p_profession']}' WHERE user_id ='$myid'");
                if ($sql) {
                    header("Location: edit.php?msg=Profile Updated Successfully!");
                } else {
                    header("Location: edit.php?msg=Profile Updation Failed!");
                }
            }
        }
    } else {
        echo "image is empty";
    }
}


//To change the password
if (isset($_POST["chg_submit"])) {
    $id = $_SESSION["my_id"];
    $oldpass = mysqli_real_escape_string($conn, $_POST["logch_pass"]);
    $chkpass = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE user_id='$id'"));
    $newpass = mysqli_real_escape_string($conn, $_POST["chg_pass"]);
    $con_pass = mysqli_real_escape_string($conn, $_POST["chgc_pass"]);
    if ($chkpass["password"] == $oldpass) {
        if ($newpass == $con_pass) {
            $upadpass = mysqli_query($conn, "UPDATE user SET password= '$newpass' WHERE user_id='$id'");
            if ($upadpass) {
                header("Location: profile.php?success_chg=Password Successfully Changed!");
            }
        } else {
            header("Location: profile.php?error_chg=Password mismatched for new and current password!");
        }
    } else {
        header("Location: profile.php?error_chg=wrong old password!");
    }
}

//To change the admin password
if (isset($_POST["chg_adsubmit"])) {
    $id = $_SESSION["my_id"];
    $oldpass = mysqli_real_escape_string($conn, $_POST["log_adpass"]);
    $chkpass = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE user_id= $id"));
    $newpass = mysqli_real_escape_string($conn, $_POST["chg_adpass"]);
    $con_pass = mysqli_real_escape_string($conn, $_POST["chgc_adpass"]);
    if ($chkpass["password"] == $oldpass) {
        if ($newpass == $con_pass) {
            $upadpass = mysqli_query($conn, "UPDATE user SET password= '$newpass' WHERE user_id= $id");
            if ($upadpass) {
                header("Location: settings.php?success_chg=Password Successfully Changed!");
            }
        } else {
            header("Location: settings.php?error_chg=Password mismatched for new and current password!");
        }
    } else {
        header("Location: settings.php?error_chg=wrong old password!");
    }
}

//admin delete the user
if (isset($_GET["del_id"])) {
    $del = $_GET["del_id"];
    $row21 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE user_id = $del"));
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'projectdemo1310@gmail.com';
        $mail->Password = 'project@demo';
        $mail->SMTPSecure = 'tls';
        $mail->Port    = 587;

        $mail->setFrom('matrimonybka@gmail.com', 'matrimony');
        $mail->addAddress($row21["email"], $row21["firstname"] . " " . $row21["lastname"]);

        $mail->isHTML(true);
        $mail->Subject = 'Information!';
        $mail->Body = 'Dear ' . $row21["firstname"] . " " . $row21["lastname"] . ',<br>Due to some inappropriate information or activities the admin of our matrimony website Deleted your account!<br>Please contact us to make a Clarity.<br>Thank You!';
        if ($mail->send()) {
            $del_sql = mysqli_query($conn, "DELETE FROM user WHERE user_id='$del'");
            if ($del_sql) {
                header("Location: admin.php?msg=User removed from database successfully!");
            } else {
                header("Location: admin.php?msg=User remove failed!");
            }
        }
    } catch (Exception $e) {
        echo "Message could not be sent.";
    }
}

function matches($myid, $id)
{
    $count = 0;
    require "db.php";
    $row18 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE user_id = $myid"));
    $row19 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id"));
    if ($row18["state"] == $row19["state"]) {
        $count = $count + 1;
        if ($row18["dist"] == $row19["dist"]) {
            $count = $count + 1;
        }
    }
    if ($row18["h_edu"] == $row19["h_edu"]) {
        $count = $count + 1;
    }
    if ($row18["p_post"] == $row19["post"]) {
        $count = $count + 1;
    }
    if ($row18["p_age"] == $row19["age"]) {
        $count = $count + 1;
    }
    if ($row18["nationality"] == $row19["nationality"]) {
        if ($row18["citizenship"] == $row19["citizenship"]) {
            $count = $count + 1;
        }
    }
    if ($row18["p_religion"] == $row19["religion"]) {
        $count = $count + 1;
    }
    if ($row18["p_caste"] == $row19["caste"]) {
        $count = $count + 1;
    }
    if ($row18["pm_status"] == $row19["m_status"]) {
        $count = $count + 1;
    }
    if ($row18["f_type"] == $row19["f_type"]) {
        $count = $count + 1;
    }
    switch ($count) {
        case 1:
            $per = "10%";
            $smsg = "see other profiles!";
            break;
        case 2:
            $per = "20%";
            $smsg = "see other profiles!";
            break;
        case 3:
            $per = "30%";
            $smsg = "see other profiles!";
            break;
        case 4:
            $per = "40%";
            $smsg = "see other profiles!";
            break;
        case 5:
            $per = "50%";
            $smsg = "see other profiles!";
            break;
        case 6:
            $per = "60%";
            $smsg = "Good choice! see other profiles also!";
            break;
        case 7:
            $per = "70%";
            $smsg = "better choice!";
            break;
        case 8:
            $per = "80%";
            $smsg = "better match! Get soon Married";
            break;
        case 9:
            $per = "90%";
            $smsg = "Good match! Get soon Married";
            break;
        case 10:
            $per = "100%";
            $smsg = "Perfect Match! Get soon Married";
            break;
        default:
            $per = "0%";
            $smsg = "Poor choice!";
    }
    $arr = array($per, $smsg);
    return $arr;
}

//matching scores to view over userhome.php
if (isset($_GET["mat_id"])) {
    $my_id = $_SESSION["my_id"];
    $id = $_GET["mat_id"];
    $arr = matches($my_id, $id);
    $percent = $arr[0];
    $smsg = $arr[1];
    header("Location: userhome.php?per=$percent&smsg=$smsg");
}
//matching scores to view over userview.php
if (isset($_GET["matu_id"])) {
    $my_id = $_SESSION["my_id"];
    $id = $_GET["matu_id"];
    $arr = matches($my_id, $id);
    $percent = $arr[0];
    $smsg = $arr[1];
    header("Location: userview.php?per=$percent&smsg=$smsg&id=$id");
}


if (isset($_GET["up"])) {
    $up = $_GET["up"];
    $p = "P";
    if (mysqli_query($conn, "UPDATE user SET status = '$p' WHERE user_id = $up")) {
        $_SESSION["my_status"] = 'P';
        header("Location: userhome.php?fri_msg=Now you are Premium Member");
    }
}

//friend-send and receive request

//sent request
if (isset($_GET["receiver"])) {
    $my_id = $_SESSION["my_id"];
    $to_id = $_GET["receiver"];
    $sent = mysqli_query($conn, "INSERT INTO friend(sender, receiver, status) VALUES('$my_id','$to_id',0)");
    if ($sent) {
        header("location: userhome.php?fri_msg=Request Sent!");
    } else {
        header("location: userhome.php?fri_msg=Request Sent failed!");
    }
}

//accept request
if (isset($_GET["sender"])) {
    $from_id = $_GET["sender"];
    $myid = $_SESSION["my_id"];
    $confirm = mysqli_query($conn, "UPDATE friend SET status = 1 WHERE (sender = $from_id AND receiver = $myid)");
    if ($confirm) {
        header("location: userhome.php?fri_msg=Connection added!");
    }
}

//delete request
if (isset($_GET["del"])) {
    $from_id = $_GET["del"];
    $myid = $_SESSION["my_id"];
    $confirm_delreq = mysqli_query($conn, "DELETE FROM friend WHERE ((sender = $from_id AND receiver = $myid) AND status = 0)");
    if ($confirm_delreq) {
        header("location: userhome.php?fri_msg=Request Declined!");
    }
}

//cancel request
if (isset($_GET["c_req"])) {
    $to_id = $_GET["c_req"];
    $myid = $_SESSION["my_id"];
    $confirm_delreq = mysqli_query($conn, "DELETE FROM friend WHERE ((sender = $myid AND receiver = $to_id) AND status = 0)");
    if ($confirm_delreq) {
        header("location: userhome.php?fri_msg=Request Canceled!");
    }
}

//remove from connection list
if (isset($_GET["rem"])) {
    $id = $_GET["rem"];
    $myid = $_SESSION["my_id"];
    $confirm_delcon = mysqli_query($conn, "DELETE FROM friend WHERE (((sender = $myid AND receiver = $id) OR (sender = $id AND receiver = $myid)) AND status = 1)");
    if ($confirm_delcon) {
        header("location: userhome.php?fri_msg=Connection Removed!");
    }
}
