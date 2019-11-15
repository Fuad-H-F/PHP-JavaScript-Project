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
                        <option value="logout"> <a href="../index.php">Sign out</a> </option>
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
                <h2>Forum Lists</h2>
                <form action="forumHandler.php" method="post">
                    <select name="catgory" id="">
                        <option value="cat" disabled selected>Catagories</option>
                        <option value="science">Science</option>
                        <option value="engineering">Engineeiring</option>
                        <option value="arts">Arts</option>
                    </select>
                    <input type="submit" value="Recent" name="recent">
                    <input type="submit" value="Week" name="week">
                    <input type="submit" value="Month" name="month">
                </form>
                <!-- tiles -->
                            
                <table>
                    <?php
                        $sql = "select * from forum";
                        $result = get_result($sql);
                        $i = 0;
                        //$row = mysqli_fetch_assoc($result);
                        //print_r($row);
                        //print($row['book_title']);

                        while(($row = mysqli_fetch_assoc($result)) && $i<10)
                        { $i++;
                            //print_r($row);
                            //print($row['book_title']);
                            //print_r(mysqli_fetch_assoc($result));
                            //print_r($row['ID']."<br>");
                    ?>
                        <tr>
                            <td colspan='2'><?=$row['book_title']?></td>
                        </tr>
                        <tr>
                            <td><?=$row['author_name']?></td>
                            <td>
                                <form action=<?="bookForumDetails.php?id=".$row['ID']?> method="post">
                                    <input type="submit" value="View" name="details">
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