<?php
session_start();
require_once('../dbfiles/db.php');

if(isset($_POST['details']))
{
    $id = $_REQUEST['id'];
    $email = $_SESSION['index_login_email'];
    $sql = "select * from forum_member where forum_id = $id and member_email = '$email' and status = 'Accepted'";

    $result = get_result($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        header('location: bookForumDetails.php?id='.$id);
        exit;
    }
    header('location: bookForumDetailsWithoutCom.php?id='.$id);
    exit;
}
?>