<?php 
session_start();
require_once('../dbfiles/db.php');
// $id = $_GET['id'];
// echo $id;
if(isset($_POST['joinFor']))
{
    $id = $_REQUEST['id'];
    $sql = "insert into forum_member (forum_id, member_email, status) values ($id, '".$_SESSION['index_login_email']."', 'applied')";
    $status = exe_query($sql);
    if($status == 1)
    {
        header('location: joinRequest.php');
        exit;
    }else{
        echo 'database failure';
    }
}else if(isset($_POST['accept'])){
    $id = $_REQUEST['id'];
    // echo $id;
    $sql = "update forum_member set status = 'Accepted' where forum_id = $id";
    $status = exe_query($sql);
    if($status == 1)
    {
        header('location: forumBookReqList.php?id='.$id);
    }
}

?>