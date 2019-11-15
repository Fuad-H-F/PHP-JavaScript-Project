<?php
   session_start();
   require_once('../dbfiles/db.php');
   if(!isset($_SESSION['index_login_email']))
   {
       header('location: ../index.php');
       exit;
   } 
    $to = $_REQUEST['to'];
    $user = $_SESSION['index_login_email'];
   if(isset($_POST['send'])){
        $user = $_SESSION['index_login_email'];
        $owner = $_REQUEST['to'];
        $date = date("Y-m-d H:i:s");
        $mes = $_POST['message'];
        $sql = "insert into chat values ('$user', '$owner', '$date', '$mes')";
        $stat = exe_query($sql);
   }
?>

<html>
    <head>
        <title>Conversations</title>
    </head>
    <body>
        <table border="1" width='80%' align='center'>
            <tr>
                <td>
                    <!-- first row -->
                    <table>
                        <tr>
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
                                <form action="#" method="post">
                                    <input type="text" name="message" id=""> 
                                    <input type="submit" value="Send" name="send">
                                </form>
                                    <table>
                                        <?php
                                            
                                            $sql = "select from_user,message from chat where from_user = '$user' or from_user = '$to' and to_user = '$to' or to_user = '$user' order by time desc";
                                            //echo $sql;
                                            $res = get_result($sql);
                                            while($row = mysqli_fetch_assoc($res)){
                                                $mail = $row['from_user'];
                                                $sql2 = "select name from user_login where email = '$mail'";
                                                $mres = get_result($sql2);
                                                $mrow = mysqli_fetch_assoc($mres);
                                        ?>
                                        <tr>
                                            <td><strong><?=$mrow['name']?>:</strong> </td>
                                            <td><?=$row['message']?></td>
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