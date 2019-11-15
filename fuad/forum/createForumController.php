<?php
session_start();
require_once('../dbfiles/db.php');
if(isset($_POST['submit']))
{
    $bTitle = $_POST['bTitle'];
    $bWriter = $_POST['bWriter'];
    $bEdition = $_POST['bEdition'];
    $description = $_POST['description'];
    $descriptionArr =  explode("'",$description);
    $arrLength = count($descriptionArr);
    $descriptionModified = $descriptionArr[0]; 
    for($i = 1; $i< $arrLength; $i++)
    {
        $descriptionModifiedtemp = $descriptionModified;
        $descriptionModified = $descriptionModifiedtemp . "''" . $descriptionArr[$i]; 
    }
    $tag = $_POST['tag'];
    $tagArr = explode("#", $tag);
    $sql = "insert into forum (book_title, author_name, book_edition, creator_email, forum_body) values ('$bTitle', '$bWriter', $bEdition, '".$_SESSION['index_login_email']."', '$descriptionModified')";
    $status = exe_query($sql);
    // $sql2 = "select "
    
    // $tagArrLength = count($tagArr);
    // for($i=0; $i<$tagArrLength; $i++)
    // {
    //     $sql = "insert into tag_forum values ('".$tagArr[$i]."', )"
    // }
    // echo $status;
    // echo $sql;
    if($status == 1)
    {
        header('location: myForum.php');
        exit;
    }else{
        echo 'database failure';
    }
}else{
    header('location: ../index.php');
}

?>