<?php
session_start();
require_once('../dbfiles/db.php');
unset($_SESSION['wish_ad']);
unset($_SESSION['voted']);
if(!isset($_SESSION['index_login_email']))
{
    header('location: ../index.php');
    exit;
}elseif(isset($_POST['contact']))
{
    $id = $_REQUEST['id'];
    header('location: contactseller.php?id='.$id);
    exit;
}elseif(isset($_POST['wish']))
{
    $id = $_REQUEST['id'];
    $user = $_SESSION['index_login_email'];
    $sql = "select * from wishlist where ad_id = $id and user='$user'";
    $res = get_result($sql);
    while($row = mysqli_fetch_assoc($res))
    {
        $_SESSION['wish_add'] = true;
        header('location: details.php?id='.$id);
        exit;
    }
    $sql = "insert into wishlist values ($id, '$user')";
    $stat = exe_query($sql);
    //echo $sql;
    header('location: ClientWish.php?id='.$id);
    exit;
}elseif(isset($_POST['ratebtn'])){
    $id = $_REQUEST['id'];
    $user = $_SESSION['index_login_email'];
    $rate = $_POST['rate'];
    echo $_POST['rate'];
    $sql = "select rate_id from rate_ad where ad_id=$id and voter = '$user'";
    $res = get_result($sql);
    //echo $sql;
    while($row = mysqli_fetch_assoc($res))
    {
        $_SESSION['voted'] = true;
        header('location: details.php?id='.$id);
        exit;
    }
    $sql = "insert into rate_ad (ad_id, voter, rate) values ($id, '$user', $rate)";
    $stat = exe_query($sql);
    //echo $sql;
    header('location: details.php?id='.$id);
    exit;
}

?>