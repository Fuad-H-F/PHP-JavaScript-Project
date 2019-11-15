<?php
    if(isset($_GET['home']))
    {
        header( 'Location: home.php');
    }elseif(isset($_GET['myads']))
    {
        header('Location: ClientAds.php');
    }elseif(isset($_GET['mywish']))
    {
        header('Location: ClientWish.php');
    }elseif(isset($_GET['chat']))
    {
        header('Location: conversations.php');
    }
?>