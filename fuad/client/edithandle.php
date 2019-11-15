<?php
    session_start();
    require_once('../validators/input_validators.php');
    require_once('../dbfiles/db.php');
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }
    if(isset($_POST['cancel']))
    {
        header("Location: ClientAds.php");
    }elseif(isset($_POST['submit'])){
        
        //echo "Your ad is proceesing by the system";
        $id = $_REQUEST['id'];
        reset_session_flags();
        $user = $_SESSION['index_login_email'];
        $error = false;
        $bookname = $_POST['bookName'];
        $_SESSION['bookname'] = $bookname;
        if(empty($bookname))
        {
            $_SESSION['bookname_null'] = true;
            $error = true;
        }
        $writername = $_POST['writerName'];
        $_SESSION['writername'] = $writername;
        if(empty($writername))
        {
            $_SESSION['writername_null'] = true;
            $error = true;
        }
        $edition = $_POST['edition'];
        $_SESSION['edition'] = $edition;
        if(empty($edition))
        {
            $_SESSION['edition_null'] = true;
            $error = true;
        }
        if(!numberchk($edition))
        {
            $_SESSION['edition_error'] = true;
            $error = true;
        }
        $adType;
        if(isset($_POST['adType']))
            $adType = $_POST['adType'];
        else
        {
            $_SESSION['adtype_not_selected'] = true;
            $error = true;
        }
        $price = $_POST['price'];
        $_SESSION['price'] = $price;
        if(!strcmp('donate', $adType))
        {
            if(empty($price))
            {
                $_SESSION['price_null'] = true;
                $error = true;
            }
        }
        $copy = $_POST['copy'];
        $_SESSION['copy'] = $copy;
        if(empty($copy) || $copy < 1)
        {
            $_SESSION['copy_null'] = true;
            $error = true;
        }
        $total_price;
        if(!$error) 
            $total_price = $price * $copy;
        $details = $_POST['bookDetails'];
        $descriptionArr =  explode("'",$details);
        $arrLength = count($descriptionArr);
        $descriptionModified = $descriptionArr[0]; 
        for($i = 1; $i< $arrLength; $i++)
        {
            $descriptionModifiedtemp = $descriptionModified;
            $descriptionModified = $descriptionModifiedtemp . "''" . $descriptionArr[$i]; 
        }
        $details = $descriptionModified;
        $_SESSION['details'] = $details;
        $house = $_POST['house'];
        $road = $_POST['road'];
        $area = $_POST['area'];
        if(empty($area))
        {
            $_SESSION['area_null'] = true;
            $error = true;
        }
        $subdistrict = $_POST['subdistrict'];
        if(empty($subdistrict))
        {
            $_SESSION['subdistrict_null'] = true;
            $error = true;
        }
        $postcode = $_POST['postCode'];
        if(empty($postcode))
        {
            $_SESSION['postcode_null'] = true;
            $error = true;
        }
        $district = $_POST['district'];
        if(empty($district))
        {
            $_SESSION['district_null'] = true;
            $error = true;
        }
        $phnNo = $_POST['phnNo'];
        if(empty($phnNo) || !numberchk($phnNo))
        {
            $_SESSION['phnNo_null'] = true;
            $error = true;
        }
        $email = $_POST['uemail'];
        if(!email_valid($email))
        {
            $_SESSION['email_null'] = true;
            //echo "dukse";
            $error = true;
        }
        // $image1 = $_POST['image1'];
        // if(!isset($_FILES['image1']))
        // {
        //     $_SESSION['image1_null'] = true;
        //     $error = true;
        // }
        // $image2 = $_POST['image2'];
        // $image3 = $_POST['image3'];
        if($error)
            exit_to_editad($id);
        $timeFrom = $_POST['from'];
        $timeTo = $_POST['upto'];
        echo "start db task";
        //$date = date("Y-m-d");
        $sql = "update book_ad set bookname = '$bookname', writer='$writername', edition=$edition, adtype='$adType', unitprice = $price, copy = $copy, totalprice = $total_price, details = '$details', house = '$house', road = '$road', area = '$area', subdistrict = '$subdistrict', district = '$district', postcode='$postcode', phoneno = '$phnNo', email = '$email', timefrom = '$timeFrom', timeto = '$timeto' where id=$id";
        $stat = exe_query($sql);
        //$con = get_connection();
        
        //echo $id;
        $_FILES['image1']['name'] = 'img1'.$id.'.jpg';
        $filepath = 'adimage/'.$_FILES['image1']['name'];
        if(move_uploaded_file($_FILES['image1']['tmp_name'], $filepath)){
            $sql = "update ad_image set image_path_1 = '$filepath' where ad_id = '$id'";
            exe_query($sql);
            //echo "image uploaded at: ".$filepath;
        }else{
            //echo "failed";
        }
        if(isset($_FILES['image2']))
        {
            $_FILES['image2']['name'] = 'img2'.$id.'.jpg';
            $filepath = 'adimage/'.$_FILES['image2']['name'];
            if(move_uploaded_file($_FILES['image2']['tmp_name'], $filepath)){
                $sql = "update ad_image set image_path_2 = '$filepath' where ad_id = '$id'";
                exe_query($sql);
                //echo "image uploaded at: ".$filepath;
            }else{
                //echo "failed";
            }
        }
        if(isset($_FILES['image3']))
        {
            $_FILES['image3']['name'] = 'img3'.$id.'.jpg';
            $filepath = 'adimage/'.$_FILES['image3']['name'];
            if(move_uploaded_file($_FILES['image3']['tmp_name'], $filepath)){
                $sql = "update ad_image set image_path_3 = '$filepath' where ad_id = '$id'";
                exe_query($sql);
                //echo "image uploaded at: ".$filepath;
            }else{
                //echo "failed";
            }
        }
        reset_session_flags();
        
        header("Location: ClientAds.php");
        
    }

    

    function reset_session_flags()
    {
        unset($_SESSION['bookname']);
        unset($_SESSION['bookname_null']);
        unset($_SESSION['writername']);
        unset($_SESSION['writername_null']);
        unset($_SESSION['edition']);
        unset($_SESSION['edition_null']);
        unset($_SESSION['adtype_not_selected']);
        unset($_SESSION['price']);
        unset($_SESSION['price_null']);
        unset($_SESSION['copy']);
        unset($_SESSION['copy_null']);
        unset($_SESSION['details']);
        unset($_SESSION['area_null']);
        unset($_SESSION['subdistrict_null']);
        unset($_SESSION['postcode_null']);
        unset($_SESSION['district_null']);
        unset($_SESSION['phnNo_null']);
        unset($_SESSION['email_null']);
        unset($_SESSION['image1_null']);
    }

    function exit_to_adplace($id)
    {
        header('location: editad.php?id='.$id);
        exit;
    }

?>