<?php
session_start();
require_once('../dbfiles/db.php');
if(isset($_POST['update']))
{
    $id = $_REQUEST['id'];
    $bTitle = $_POST['bTitle'];
    $bWriter = $_POST['bWriter'];
    $bEdition = $_POST['bEdition'];
    $description = $_POST['description'];
    $index_login_email =  $_SESSION['index_login_email'];
    $tag = $_POST['tag'];

    $sql = "update forum set book_title = '$bTitle' , author_name = '$bWriter', book_edition = $bEdition, creator_email = '$index_login_email', forum_body = '$description' where ID = $id ";
    $status = exe_query($sql);
    if($status == 1)
    {
        header('location: myForumBook1.php?id='.$id.'');
        exit;
    }else{
        echo 'database failure';
    }
}
elseif(isset($_POST['cancel'])){
    $id = $_REQUEST['id'];
    header('location: myForumBook1.php?id='.$id.'');
}
elseif(isset($_POST['delete'])){
    $id = $_REQUEST['id'];
    $sql = "delete from forum where ID = $id";
    $status = exe_query($sql);
    if($status == 1)
    {
        header('location: myForum.php?id='.$id.'');
        exit;
    }
    else{
        echo 'database failure';
    }
}
else{
    $id = $_REQUEST['id'];
    header('location: forumHome.php?id='.$id.'');
}

?>