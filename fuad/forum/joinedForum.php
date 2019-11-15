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
<body>
    <table width="99%" border="1" style="background-color: mediumseagreen;">
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
                        <option value="logout"> <a href="../index.php">Sign out</a> </option>
                    </select>
                </form> -->
            </td>
        </tr>
    </table>
    <!-- end of navbar table -->
    <!-- main body -->
    <table width="99%" border="1" style="background-color: mediumseagreen;">
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
                
                    $email = $_SESSION['index_login_email'];

                    $sql = "select * from forum_member where member_email = '$email' and status='Accepted'";
                    $result = get_result($sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $id = $row['forum_id'];
                        $sql2 = "select * from forum where ID = $id";
                        $result2 = get_result($sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                ?>
                    <tr>
                        <td><?=$row2['book_title']?></td>
                    </tr>
                    <tr>
                        <td><?=$row2['author_name']?></td>
                        <td>
                            <form action=<?="bookForumDetails.php?id=".$row2['ID']?> method="post">
                                <input type="submit" value="View" name="details">
                            </form>
                        </td>
                    </tr>
                <?php
                    }
               ?>
               </table> 
            </td>
        </tr>
    </table>
</body>
</html>