<?php
require_once('dbfiles/db.php');
require_once("validators/input_validators.php");

session_start();

unset_session_flags();
if(isset($_COOKIE['rem_em']) && isset($_COOKIE['rem_pass']))
{
    $email = $_COOKIE['rem_em'];
    $pass = $_COOKIE['rem_pass'];
    
    
    $sql = "select * from user_login where email='$email'";
    $user = get_result($sql);
    $user_found = false;
    $pass_match = false;
    while($row = mysqli_fetch_assoc($user))
    {
        $user_found = true;
        if($user_found)
        {
            $sql = "select * from user_login where email='$email' and password='$pass'";
            $password_db = get_result($sql);
            while($pass_row = mysqli_fetch_assoc($password_db))
            {
                $pass_match = true;
            }
        }
    }
    if($user_found && $pass_match)
    {
        // echo "login succesfull";
        header('location: client/home.php');
        
        unset_session_flags();
        exit;
    }elseif(!$user_found)
    {
        $_SESSION['index_login_email_not_found'] = true;
        exit_to_index();
    }elseif(!$pass_match)
    {
        $_SESSION['index_login_pass_do_not_match'] = true;
        exit_to_index();
    }
    exit_to_index();
}
if(isset($_POST['login']))
{
    $email = $_POST['lemail'];
    $pass = $_POST['lpass'];
    if(isset($_POST['remember']))
    {
        setcookie($rem_em, $email, time() + (86400 * 999), "/");
        setcookie($rem_pass, $pass, time() + (86400 * 999), "/");
    }
    $_SESSION['index_login_email'] = $email;
    if(empty($email))
    {
        $_SESSION['index_login_email_empty'] = true;
        exit_to_index();
    }
    if(empty($pass))
    {
        $_SESSION['index_login_pass_empty'] = true;
        exit_to_index();
    }
    if(!email_Valid($email))
    {
        $_SESSION['index_login_email_not_valid'] = true;
        exit_to_index();
    }
    $sql = "select * from user_login where email='$email'";
    $user = get_result($sql);
    $user_found = false;
    $pass_match = false;
    while($row = mysqli_fetch_assoc($user))
    {
        $user_found = true;
        if($user_found)
        {
            $sql = "select * from user_login where email='$email' and password='$pass'";
            $password_db = get_result($sql);
            while($pass_row = mysqli_fetch_assoc($password_db))
            {
                $pass_match = true;
            }
        }
    }
    if($user_found && $pass_match)
    {
        // echo "login succesfull";
        if(isset($_POST['remember']))
        {
            setcookie($rem_em, $email, time() + (86400 * 999), "/");
            setcookie($rem_pass, $pass, time() + (86400 * 999), "/");
        }
        header('location: client/home.php');
        unset_session_flags();
        exit;
    }elseif(!$user_found)
    {
        $_SESSION['index_login_email_not_found'] = true;
        exit_to_index();
    }elseif(!$pass_match)
    {
        $_SESSION['index_login_pass_do_not_match'] = true;
        exit_to_index();
    }
    exit_to_index();
}elseif(isset($_POST['submit']))
{
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];
    $_SESSION['index_reg_name'] = $name;
    $_SESSION['index_reg_email'] = $email;

    if(empty($name))
    {
        $_SESSION['index_reg_name_empty'] = true;
        exit_to_index();
    }
    if(!first_char_name_valid($name))
    {
        $_SESSION['index_reg_name_first_char_not_valid'] = true;
        exit_to_index();
    }
    if(!chars_name_valid($name))
    {
        $_SESSION['index_reg_name_chars_not_valid'] = true;
        //exit_to_index();
    }
    if(!two_words_valid($name))
    {
        $_SESSION['index_reg_name_words_not_valid'] = true;
        exit_to_index();
    }
    if(empty($email))
    {
        $_SESSION['index_reg_email_empty'] = true;
        exit_to_index();
    }
    if(!email_valid($email))
    {
        $_SESSION['index_reg_email_not_valid'] = true;
        exit_to_index();
    }
    if(!email_db_chk($email))
    {
        $_SESSION['index_reg_email_exists_db'] = true;
        exit_to_index();
    }
    if(empty($pass))
    {
        $_SESSION['index_reg_pass_empty'] = true;
        exit_to_index();
    }
    if(strcmp($pass, $conpass) != 0)
    {
        $_SESSION['index_reg_pass_do_not_match'] = true;
        exit_to_index();
    }
    if(!isset($_POST['terms']))
    {
        $_SESSION['index_reg_terms_not_check'] = true;
        exit_to_index();
    }
    $sql = "insert into user_login values('$email','$name', '$pass', 'client', 0)";
    $status = exe_query($sql);
    unset_session_flags();
    //echo $status;
    //header('Location: index.php');
    $sql2 = "insert into `user_info` (`uemail`, `dob`, `gender`, `house`, `road`, `area`, `subdistrict`, `postcode`, `district`, `phoneno`, `secondphoneno`, `timefrom`, `timeto`, `picture`, `status`) VALUES ('$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT')";
    $status2 = exe_query($sql2);
    $_SESSION['user_email'] = $email;
    $_SESSION['index_login_email'] = $email;
    header("Location: reg.php");
    exit;
    // if($status == 1)
    // {
        
    //     if($status2 == 1)
    //     {
            
    //     }
    //     else
    //     {
    //         $sql3 = "delete from user_login where email = '$email'";
    //         exe_query($sql3);
    //         exit_to_index();
    //     }
    // }else{
    //     exit_to_index();
    // }
}else{
    exit_to_index();
}

function unset_session_flags()
{
    unset($_SESSION['index_login_email_empty']);
    unset($_SESSION['index_login_pass_empty']);
    unset($_SESSION['index_login_email_not_valid']);
    unset($_SESSION['index_reg_name_empty']);
    unset($_SESSION['index_reg_email_empty']);
    unset($_SESSION['index_reg_pass_empty']);
    unset($_SESSION['index_reg_name_first_char_not_valid']);
    unset($_SESSION['index_reg_name_chars_not_valid']);
    unset($_SESSION['index_reg_name_words_not_valid']);
    unset($_SESSION['index_reg_email_not_valid']);
    unset($_SESSION['index_reg_terms_not_check']);
    unset($_SESSION['index_reg_pass_do_not_match']);
    unset($_SESSION['index_reg_email_exists_db']);
    unset($_SESSION['index_login_email_not_found']);
    unset($_SESSION['index_login_pass_do_not_match']);
}

function exit_to_index()
{
    header('Location: index.php');
    exit;
}

?>