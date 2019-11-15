<html>
<head>
    <title>Profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css" media="all" />
</head>
<body>

   <table border="1" width='100%' align='center'>
            <tr class="heading-section">
                <td>
                    <!-- first row -->
                    <table>
                        <tr class="heading">
                            <td>
                                <h2>bookAbook</h2>
                            </td>
                            <form action="searchAction.php" method='post'>
                            <td>
                                <input type="search" name="search" value="" id='sfiled' onkeyup='searchname()'/><br>
                                <div id='search_val'>
                                    <table id='svalue'>
                                    </table>
                                </div>
                            </td>
                            <td>
                                <input type="submit" value="Search" name='searchbtn'>
                            </td>
                            </form>
                            <form action="placeAd.php" method="get">
                            <td>
                                <input type="submit" value="Place an ad +" name='ad'>
                            </td>
                            <td>
                                <a href="profile.php">Profile</a>
                                <a href="../index.php">Sign out</a>
                                <!-- <form action="">
                                    <select name="" id="">
                                        <option value="settings">Settings</option>
                                        <option value="logout"> <a href="../index.php">Sign out</a> </option>
                                    </select>
                                </form> -->
                            </td>
                        </form>
                        </tr>
                    </table>
                </td>
            </tr>
    </table>
    <table class="main-section" border="1">
        <tr>
            <td>Name:</td>
            <td>Value</td>
            <td>
                <img src="profile.jpg" alt="profile.jpg">
            </td>
        </tr>
        <tr>
            <td>Emial:</td>
            <td>value</td>
        </tr>
        <tr>
            <td>Dob:</td>
            <td>Value</td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>Value</td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>Value</td>
        </tr>
        <tr>
            <td>Phone no:</td>
            <td>Value</td>
        </tr>
        <tr>
            <td>change password</td>
            <td>
                <form action="#">
                    <input type="submit" value="change password">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>