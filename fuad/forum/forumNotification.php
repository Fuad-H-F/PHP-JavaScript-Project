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
                <form action="forumHandler.php" method="post">
                    <table>
                        <tr>
                            <td><center><h1>Notifications</h1></center></td>
                        </tr>
                        <tr>
                            <td><a href=""><b>1.</b> Rashed requested to join your book forum 1</a></td>
                        </tr>
                        <tr>
                            <td><a href=""><b>2.</b> Niti requested to join your book forum 3</a></td>
                        </tr>
                        <tr>
                            <td><a href=""><b>3.</b> Maimun commented on book forum 1</a></td>
                        </tr>
                        <tr>
                            <td><a href=""><b>4.</b> Rashed requested to join your book forum 2</a></td>
                        </tr>
                        <tr>
                            <td><a href=""><b>5.</b> Rafi requested to join your book forum 1</a></td>
                        </tr>
                        <tr>
                            <td><a href=""><b>6.</b> Shaon commented on book forum 1</a></td>
                        </tr>
                        <tr>
                            <td><a href=""><b>7.</b> Rashed requested to join your book forum 3</a></td>
                        </tr>
                    </table>
                </form>
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