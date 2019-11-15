<?php
    session_start();
    require_once('validators/input_validators.php');
    require_once('dbfiles/db.php');

    if(!isset($_SESSION['user_email']))
    {
      header('location: index.php');
      exit;
    }

    if(isset($_POST['submit']))
    {
        reset_session_flags();
        if(strtotime($_POST['dob']) == '')
        {
            $_SESSION['dob_empty'] = true;   
            exit_to_reg(); 
        }
        $date = date('Y-m-d', strtotime($_POST['dob']));
        $currentdate = date('Y-m-d');
        $arr =  datechk($date, $currentdate);
        if(!($arr['year'] >= 15 && $arr['flag'] == '-'))
        {
            // print_r($arr);
            // echo 'less then 15';
            $_SESSION['dob_not_valid'] = true;   
            exit_to_reg(); 
        }
        $gender;
        if(isset($_POST['gender']))
            $gender = $_POST['gender'];
        else
        {
            $_SESSION['gender_empty'] = true;   
            exit_to_reg(); 
        } 
        $house = $_POST['house'];
        $road = $_POST['road'];
        $area = $_POST['area'];
        $subdis = $_POST['subdis'];
        $postcode = $_POST['postCode'];
        $district = $_POST['district'];
        $phoneno = $_POST['phnno'];
        $phoneno2 = $_POST['phnNo2'];
        $timefrom = $_POST['fromTime'];
        $timeto = $_POST['toTime'];
        $_SESSION['phnno'] = $phoneno;
        if(empty($area))
        {
            $_SESSION['area_empty'] = true;
            exit_to_reg();
        }
        if(empty($subdis))
        {
            $_SESSION['subdis_empty'] = true;
            exit_to_reg();
        }
        if(empty($postcode))
        {
            $_SESSION['postcode_empty'] = true;
            exit_to_reg();
        }
        if(empty($district))
        {
            $_SESSION['district_empty'] = true;
            exit_to_reg();
        }
        if(empty($phoneno))
        {
            $_SESSION['phoneno_empty'] = true;
            echo $phoneno;
            //exit_to_reg();
        }
        $phnnoarr = str_split($phoneno);
        if(count($phnnoarr) != 11 || !numberchk($phoneno))
        {
            $_SESSION['phoneno_not_valid'] = true;
            exit_to_reg();
        }
        $_FILES['uploadimg']['name'] = $_SESSION['user_email'].'.jpg';
        $filepath = 'profileimgs/'.$_FILES['uploadimg']['name'];
        if(move_uploaded_file($_FILES['uploadimg']['tmp_name'], $filepath)){
            $sql = "update user_info set picture='$filepath' where uemail='".$_SESSION['user_email']."'";
            exe_query($sql);
            //echo "image uploaded at: ".$filepath;
        }else{
            //echo "failed";
        }
        $updateTablecols = "update user_info set dob='$date', gender='$gender', area='$area', subdistrict='$subdis', postcode='$postcode', district='$district', phoneno='$phoneno', status='done' where uemail='".$_SESSION['user_email']."'";
        
        // $updateTablecols = "update user_info set dob='$date' where uemail='".$_SESSION['user_email']."'";
        $status =  exe_query($updateTablecols);
        // echo $status;
        if(!empty($house))
        {
            $updateTablecols = "update user_info set house='$house' where uemail='".$_SESSION['user_email']."'";
            $status =  exe_query($updateTablecols);
        }
        if(!empty($road))
        {
            $updateTablecols = "update user_info set road='$road' where uemail='".$_SESSION['user_email']."'";
            $status =  exe_query($updateTablecols);
        }
        if(!empty($phoneno2))
        {
            $updateTablecols = "update user_info set secondphoneno='$phoneno2' where uemail='".$_SESSION['user_email']."'";
            $status =  exe_query($updateTablecols);
        }
        if(!empty($timefrom))
        {
            $updateTablecols = "update user_info set timefrom='$timefrom' where uemail='".$_SESSION['user_email']."'";
            $status =  exe_query($updateTablecols);
        }
        if(!empty($timeto))
        {
            $updateTablecols = "update user_info set timeto='$timeto' where uemail='".$_SESSION['user_email']."'";
            $status =  exe_query($updateTablecols);
        }
        reset_session_flags();
        header('location: client/home.php');
        //$picpath = $_POST['uploadimg'];

    }elseif(isset($_POST['Cancel']))
    {
        //echo 'do it letter';
        
         header("Location: client/home.php");
    }


    function reset_session_flags()
    {
        unset($_SESSION['dob_empty']);
        unset($_SESSION['dob_not_valid']);
        unset($_SESSION['gender_empty']);
        unset($_SESSION['area_empty']);
        unset($_SESSION['subdis_empty']);
        unset($_SESSION['postcode_empty']);
        unset($_SESSION['district_empty']);
        unset($_SESSION['phoneno_empty']);
        unset($_SESSION['phoneno_not_valid']);
        unset($_SESSION['phnno']);
    }
  
    function exit_to_reg()
    {
        header('Location: reg.php');
        exit;
    }
  
?>