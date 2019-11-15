<?php 
    session_start();
    require_once('../dbfiles/db.php');
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }elseif(isset($_POST['delete']))
    {
        $id = $_REQUEST['id'];
        $sql = "delete from wishlist where ad_id = $id";
        $stat = exe_query($sql);
        //echo $sql;
        header('location: ClientWish.php');
        exit;
    }
?>

