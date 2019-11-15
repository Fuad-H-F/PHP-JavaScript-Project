<?php
    session_start();
    require_once('../dbfiles/db.php');
?>
<html>
    <head>
        <title>Home</title>
		<link rel="stylesheet" type="text/css" href="home.css" media="all" />
    </head>
    <body>
        <table border="1" width='100%' align='center'>
            <tr class="heading-section">
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
            <tr class="mid-section">
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
                                <table border='1' name='booklist'>
                                        <?php
                                            $user = $_SESSION['index_login_email'];
                                            $sql = "select * from book_ad order by id desc";
                                            $result = get_result($sql);
                                            $i = 0;
                                            while(($row = mysqli_fetch_assoc($result)) && $i<10)
                                            { 
                                                $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><?=$row['bookname']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Writer: <?=$row['writer']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Edition: <?=$row['edition']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>For <?=$row['adtype']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <form action="<?php
                                                                $sql2 = "select owner from book_ad where id = ".$row['id']."";
                                                                $em = get_result($sql2);
                                                                $row2 = mysqli_fetch_assoc($em);
                                                                $user = $_SESSION['index_login_email'];
                                                                $owner = $row2['owner'];
                                                                if($user == $owner)
                                                                    echo "clientMydetailsHandle.php?id=".$row['id']."";
                                                                else 
                                                                    echo "details.php?id=".$row['id']."";
                                                            ?>" method='post'> 
                                                                <input type="submit" value='Details'>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <form action="">
                                                                <input type="submit" value="Share">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <?php 
                                                 $sql2 = "select * from ad_image where ad_id = '".$row['id']."'";
                                                //$sql2 = "select * from ad_image where ad_id = '16'";
                                                $res = get_result($sql2);
                                                $row2 = mysqli_fetch_assoc($res);
                                            ?>
                                            <td>
                                                <img src="cover.jpg" alt="image.jpg" width="300px" height="300px">
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
                                        <td>
                                            <table>
                                                <tr>
                                                    <td> <h3 style="color:red">Filter</h3> </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                    <select name="filterbystat" id="">
                                                        <option value="select_an_option" disabled selected>Select any option</option>
                                                        <option value="sell">for sell</option>
                                                        <option value="rent">for rent</option>
                                                        <option value="donate">for donate</option>
                                                    </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Price</td>
                                                    <td>
                                                    <select name="filterbyprice" id="">
                                                        <option value="select_an_option" disabled selected>Select any option</option>
                                                        <option value="low_to_high">low to high</option>
                                                        <option value="high_to_low">high to low</option>
                                                    </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>General</td>
                                                    <td>
                                                    <select name="filterbygen" id="">
                                                        <option value="select_an_option" disabled selected>Select any option</option>
                                                        <option value="most_recent">most recent</option>
                                                        <option value="most_rated">most rated</option>
                                                        <option value="most_rated">nearest location</option>
                                                        <option value="week">last week</option>
                                                        <option value="month">last month</option>
                                                    </select>
                                                    </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
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

        <script>
            function searchname()
            {
                var val = document.getElementById('sfiled').value;
                //console.log(val);
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "search.php?key="+val, true);
                xhttp.send();
                var table = document.getElementById('svalue');
                var length = table.rows.length;
                for(var i = table.rows.length - 1; i > -1; i--)
                {
                    table.deleteRow(i);
                }

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var row = table.insertRow(table.rows.length);
                        var cell1 = row.insertCell(0);
                        var value = this.responseText.toString();
                        //setvalue(value);
                        cell1.innerHTML = "<span onclick='setvalue("+value+")'>"+this.responseText+"</span>";
                        var p = "<span onclick='setvalue("+value+")'>"+this.responseText+"</span>";
                        //setvalue(value);
                        console.log(p);
                    }
                };
                if(val === "")
                    document.getElementById("search_val").style.display = 'none';
                else
                    document.getElementById("search_val").style.display = 'block';
            }

            function setvalue(name){
                console.log('name: '+name);
                document.getElementById('sfiled').value = name;
                document.getElementById("search_val").style.display = 'none';
            }
        </script>
    </body>
</html>