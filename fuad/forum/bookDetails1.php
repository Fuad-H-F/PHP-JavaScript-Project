<html>
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
                <a href="http://">User Name</a>
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
                            <td><h1>BOOK TITLE 1</h1></td>
                        </tr>
                        <tr>
                            <td><b>Writer name</b></td>
                            <td><b>Book Edition</b></td>
                        </tr>
                    </table>
                    <hr>
                    <table>
                        <tr>
                            <td>
                                <p>The oldest classical Greek and Latin writing had little or no space between words and could be written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[2] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way. </p>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <hr>
                    <table>
                        <tr>
                            <td><input type="submit" value="Join Forum" name="joinFor"></td>
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