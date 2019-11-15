<?php
    session_start();
    require_once('../dbfiles/db.php');
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }
?>

<html>
<head>
    <title>Forum</title>
</head>
<body style="background-color: mediumseagreen;">
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
                <form action="" method="post">
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
                        <option value="logout">Sign out</option>
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
                <!-- main body -->
                <h2>Create a forum</h2>
                <form action="createForumController.php" method="post">
                    <table>
                        <tr>
                            <td>
                                Book Title <br>
                                <input type="text" name="bTitle" value=""><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Author Name<br>
                                <input type="text" name="bWriter" value=""><br>
                            </td>
                            <td>
                                Book Edition<br>
                                <input type="text" name="bEdition" value=""><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                Body<br>
                                <textarea rows = "5" cols = "50" name = "description"></textarea>
                            <hr>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                Tag <br>
                                <input type="text" name="tag" value=""><br>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Submit">
                                <input type="submit" name="cancel" value="Cancel">
                            </td>
                        </tr>
                    </table>
                </form>
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