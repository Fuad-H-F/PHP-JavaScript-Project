<?php
session_start();
require_once('../dbfiles/db.php');
if(isset($_POST['submit']))
{
    $id = $_REQUEST['id'];
    $email = $_SESSION['index_login_email'];
    $body = $_POST['save'];
    //echo $body;
    $sql = "insert into forum_comment (forum_id, commentator_email, comment_body, status) values ($id, '$email', '$body', 0)";
    $status = exe_query($sql);
     header('location: bookForumDetails.php?id='.$id);
}
?>