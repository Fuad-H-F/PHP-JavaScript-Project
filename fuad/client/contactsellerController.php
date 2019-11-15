<?php
    session_start();
    require_once('../dbfiles/db.php');
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }
    if(isset($_POST['send'])){
        $id = $_REQUEST['id'];
        $user = $_SESSION['index_login_email'];
        $sql = "select owner from book_ad where id=$id";
        $res = get_result($sql);
        $row = mysqli_fetch_assoc($res);
        $owner = $row['owner'];
        $date = date("Y-m-d H:i:s");
        $mes = $_POST['message'];
        $sql = "insert into chat values ('$user', '$owner', '$date', '$mes')";
        $stat = exe_query($sql);
        //echo "header  r age";
        header('locatoin: details.php?id='.$id);
        //echo "header  r pore";
        exit;
    }
?>