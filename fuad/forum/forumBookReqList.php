<html>
<?php
    session_start();
    require_once('../dbfiles/db.php');
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }
?>

<head>
    <title>Forum</title>
</head>
<body>
    <table width="99%" border="1">
    <!-- navbar table -->
        <tr>
            <td><h2> <a href="../forum/forumHome.php">bookAbook</a></h2></td>
            <td>
                <form action="" method="get">
                    <input type="search" name="search" placeholder="Search forum" id="">
                </form>
            </td>
            <td>
                <form action="forumHandler.php" method="post">
                    <input type="submit" value="Create a forum" name="forumCreate">
                </form>
            </td>
            <td>
                <?php
                    $sql = "select * from user_login where email = '".$_SESSION['index_login_email']."'";
                    $result = get_result($sql);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['name'];
                ?>
            </td>
            <td>
            <a href="../index.php">Sign out</a>
            <!-- <form action="">
                    <select name="" id="">
                        <option value="settings">Settings</option>
                        <option value="logout">  </option>
                    </select>
                </form> -->
            </td>
        </tr>
    </table>
    <!-- end of navbar table -->
    <!-- main body -->
    <table width="99%" border="1">
        <tr>
            <td>
                <!-- menu cell -->
                <form action="forumHandler.php" method="post">
                    <input type="submit" value="Home" name="home"> <br>
                    <input type="submit" value="My forums" name="myfor"> <br>
                    <input type="submit" value="Joined forums" name="myJoinedfor"> <br>
                    <input type="submit" value="Notifications" name="noti"> <br>
                </form>
                <!-- end of menu cell -->
            </td>
            <td>
                <table>
                    <?php
                        $id = $_REQUEST['id'];
                        $sql = "select * from forum_member where status = 'applied' and forum_id = $id";
                        $result = get_result($sql);
                        //echo $sql;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['forum_id'];
                    ?>
                        <tr>
                            <td><?=$row['member_email']?></td>
                            <td>
                                <form action="joinForumController.php?id=<?=$row['forum_id']?>&user=<?=$row['member_email']?>" method="post">
                                    <input type="submit" value="Accept" name="accept">
                                </form>
                            </td>
                            <td>
                                <form action="joinForumController.php?id=<?=$row['forum_id']?>&user=<?=$row['member_email']?>" method="get"> 
                                    <input type="submit" value="Reject" name="reject">
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
                <!-- end tiles -->
            </td>
            <td>
                <!-- ad -->
                <img src="pic1.jpg" alt="picture one">
                <br>
                <img src="pic2.jpg" alt="picture two">
            </td>
        </tr>
    </table>
</body>
</html> 