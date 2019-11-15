<?php
    if(isset($_POST["myfor"]))
    {
        header('Location: myForum.php');
    }

    if(isset($_POST["myJoinedfor"]))
    {
        header('Location: joinedForum.php');
    }

    else if(isset($_POST["home"]))
    {
        header('Location: forumHome.php');
    }
    
    else if(isset($_POST["leaveForum"]))
    {
        header('Location: forumHome.php');
    }

    else if(isset($_POST["forumCreate"]))
    {
        header('Location: createForum.php');
    }

    else if(isset($_POST["noti"]))
    {
        header('Location: forumNotification.php');
    }

    //Trending Forum Book Details 
    else if(isset($_POST["view1"]))
    {
        header('Location: bookDetails1.php');
    }
    else if(isset($_POST["view2"]))
    {
        header('Location: bookDetails2.php');
    }
    else if(isset($_POST["view3"]))
    {
        header('Location: bookDetails3.php');
    }

    //My Forum Book Details 
    else if(isset($_POST["details1"]))
    {
        header('Location: myForumBook1.php');
    }
    else if(isset($_POST["details2"]))
    {
        header('Location: myForumBook2.php');
    }
    else if(isset($_POST["details3"]))
    {
        header('Location: myForumBook3.php');
    }

    //Join Request 
    else if(isset($_POST["joinFor"]))
    {
        header('Location: joinRequest.php');
    }

    //Join Request List
    else if(isset($_POST["viewReq"]))
    {
        header('Location: book1ReqList.php');
    }

    //Edit Forum
    else if(isset($_POST["editFor1"]))
    {
        header('Location: editForumBook1.php');
    }
    else if(isset($_POST["editFor2"]))
    {
        header('Location: editForumBook2.php');
    }
    else if(isset($_POST["editFor3"]))
    {
        header('Location: editForumBook3.php');
    }

    //Joined Forum Detalis 
    else if(isset($_POST["forDetails1"]))
    {
        header('Location: joinedForumDetails1.php');
    }
    else if(isset($_POST["forDetails2"]))
    {
        header('Location: joinedForumDetails2.php');
    }
    else if(isset($_POST["forDetails3"]))
    {
        header('Location: joinedForumDetails3.php');
    }

    //Report Forum
    else if(isset($_POST["reportForum1"]))
    {
        header('Location: joinedForumDetails1.php');
    }
    else if(isset($_POST["reportForum2"]))
    {
        header('Location: joinedForumDetails2.php');
    }
    else if(isset($_POST["reportForum3"]))
    {
        header('Location: joinedForumDetails3.php');
    }

?>