<?php
    session_start();
    require_once('../dbfiles/db.php');
    
?>

<html>
    <head>
        <title>Conversations</title>
    </head>
    <body style="background-color: blue;">
        <table border="1" width='80%' align='center'>
            <tr>
                <td>
                    <!-- first row -->
                    <table>
                        <tr>
                            <td>
                                <h2 style="color: white;">bookAbook</h2>
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
                            <script src="search.js"></script>
                            <form action="placeAd.php">
                            <td>
                                <input type="submit" value="Place an ad +" name='ad'>
                            </td>
                            <td>
                                <a href="../profile.php">Profile</a>
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
            <tr>
                <!-- main body -->
                <td>
                    <table border='1' width='100%'>
                            <tr>
                                <td>
                                    <!-- menu cell -->
                                    <form action="ClientMenuHandle.php" method="get">
                                        <input type="submit" value="Home" name="home"> <br>
                                        <input type="submit" value="My ads" name="myads"> <br>
                                        <input type="submit" value="My wishlist" name="mywish"> <br>
                                        <input type="submit" value="My converstations" name="chat"> <br>
                                        
                                    </form>
                                    <!-- end of menu cell -->
                                </td>
                                <td>
                                                               
                                    <table>
                                        <?php 
                                            $user = $_SESSION['index_login_email'];
                                            $sql = "SELECT * FROM chat WHERE from_user='$user' or to_user='$user' group by to_user";
                                            $res = get_result($sql);
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $to = $row['to_user'];

                                                $sql2 = "SELECT * FROM chat WHERE from_user = '$user' or from_user = '$to' and to_user = '$to' or to_user = '$user' order by time desc";
                                                $mes = get_result($sql2);
                                                $lmes = mysqli_fetch_assoc($mes);
                                                $fmes = $lmes['from_user'];
                                                $tmes = $lmes['to_user'];
                                                $sql3;
                                                if($tmes == $user)
                                                    $sql3 = "select name from user_login where email = '$fmes'";
                                                else
                                                    $sql3 = "select name from user_login where email = '$tmes'";
                                                //echo $tmes;
                                                $nameres = get_result($sql3);
                                                $name = mysqli_fetch_assoc($nameres);
                                        ?>
                                        <tr>
                                        <td>
                                            <?=$name['name']?><br>
                                            <?=$lmes['message']?>
                                        </td>
                                        <td>
                                        <form action="chatuser.php?to=<?=$to?>" method="post"> 
                                            <input type="submit" name="reply" value="Reply">
                                        </form>                             
                                        </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>  
                                         
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><a href="../forum/forumHome.php">Go to forum</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="image/ad.jpg" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="image/ad.jpg" alt="">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>