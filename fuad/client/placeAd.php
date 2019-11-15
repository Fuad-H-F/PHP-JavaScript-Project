<?php
    session_start();
    require_once('../dbfiles/db.php');
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }
    $user_email = $_SESSION['index_login_email'];
    $sql = "select house, road, area, subdistrict, postcode, district, phoneno from user_info where uemail = '$user_email'";
    $result = get_result($sql);
    $row = mysqli_fetch_assoc($result);
    $house = $row['house'];
    $road = $row['road'];
    $area = $row['area'];
    $subdistrict = $row['subdistrict'];
    $postcode = $row['postcode'];
    $district = $row['district'];
    $phoneno = $row['phoneno'];
    $bookname = $writername = $edition = $price = $copy = $details = null;
    if(isset($_SESSION['bookname']))
        $bookname = $_SESSION['bookname'];
    if(isset($_SESSION['writername']))
        $writername = $_SESSION['writername'];
    if(isset($_SESSION['edition']))
        $edition = $_SESSION['edition'];
    if(isset($_SESSION['price']))
        $price = $_SESSION['price'];
    if(isset($_SESSION['copy']))
        $copy = $_SESSION['copy'];
    if(isset($_SESSION['details']))
        $details = $_SESSION['details'];
?>

<html>
    <head>
        <title>Place an ad</title>
		<link rel="stylesheet" type="text/css" href="placeAdphp.css" media="all" />
    </head>
    <body>
        <table border="1" width='80%' align='center'>
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
                            <script src="search.js"></script>
                            <form action="placeAd.php">
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
                                        <input type="submit" value="Activities" name="activity"> <br>
                                    </form>
                                    <!-- end of menu cell -->
                                </td>
                                <td>
                                    <h2>Place an ad</h2>
                                    <form action="adPlacementhandle.php" method="post" enctype="multipart/form-data">
                                        <table>
                                            <tr>
                                                <td>Book Name:*</td>
                                                <td colspan="3">
                                                    <?php 
                                                        if(isset($_SESSION['bookname_null']))
                                                            echo "Plese enter a book name. <br>";
                                                    ?>
                                                    <input type="text" name="bookName" id="" value="<?=$bookname?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Writer Name:*</td>
                                                <td colspan="3"> 
                                                    <?php 
                                                        if(isset($_SESSION['writername_null']))
                                                            echo "Plese enter a writer name. <br>";
                                                    ?>
                                                    <input type="text" name="writerName" id="" value="<?=$writername?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>edition*</td>
                                                <td>
                                                    <?php 
                                                        if(isset($_SESSION['edition_null']))
                                                            echo "Plese enter the edition. <br>";
                                                        if(isset($_SESSION['edition_error']))
                                                            echo "Edition can only be a number. <br>";
                                                    ?> 
                                                    <input type="text" name="edition" id="" value="<?=$edition?>">
                                                </td>
                                                <td></td>
                                                <td>Ad type:* 
                                                    <?php 
                                                        if(isset($_SESSION['adtype_not_selected']))
                                                            echo "Please select an option. <br>";
                                                    ?>
                                                    <select name="adType" id="">
                                                        <option value="Select" disabled selected>Select an option</option>
                                                        <option value="sell">Sell</option>
                                                        <option value="rent">Rent</option>
                                                        <option value="donate">Donate</option>
                                                    </select>
                                                    <br>Unit price: 
                                                    <?php 
                                                        if(isset($_SESSION['price_null']))
                                                            echo "Plese enter a price. <br>";
                                                    ?>
                                                    <input type="number" name="price" id="" value="<?=$price?>">
                                                    <br>Number of copy:* 
                                                    <?php 
                                                        if(isset($_SESSION['copy_null']))
                                                            echo "Plese enter copy value. <br>";
                                                    ?>
                                                    <input type="number" name="copy" id="" value="<?=$copy?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Details</td>
                                                <td colspan="3"> <textarea name="bookDetails" id="" cols="30" rows="10"><?=$details?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <table>
                                                        <tr>
                                                        <td colspan="2">
                                                            Address (If you want to change the address for this ad, then edit this fields!!)
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <td>House</td>
                                                        <td>Road</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" name='house' value='<?=$house?>'/></td>
                                                            <td><input type="text" name='road' value='<?=$road?>'/></td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="2">Area</td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="2">
                                                            <?php 
                                                                if(isset($_SESSION['area_null']))
                                                                    echo "Area can not be empty. <br>";
                                                            ?>
                                                            <input type="text" name="area" value='<?=$area?>'/>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub-district</td>
                                                            <td>Post code</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php 
                                                                    if(isset($_SESSION['subdistrict_null']))
                                                                        echo "Sub district can not be empty. <br>";
                                                                ?>
                                                                <input type="text" name='subdistrict' value='<?=$subdistrict?>'/>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if(isset($_SESSION['postcode_null']))
                                                                        echo "Post code can not be empty. <br>";
                                                                ?>
                                                                <input type="text" name='postCode' value='<?=$postcode?>'/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>District</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php 
                                                                    if(isset($_SESSION['district_null']))
                                                                        echo "Post code can not be empty. <br>";
                                                                ?>
                                                                <input type="text" name='district' value='<?=$district?>'/>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td> 
                                                <td colspan="2">
                                                    Phone no: 
                                                    <?php 
                                                        if(isset($_SESSION['phnNo_null']))
                                                            echo "Phone no is not valid. <br>";
                                                    ?>
                                                    <input type="number" name="phnNo" id="" value='<?=$phoneno?>'> <br>
                                                    Email: 
                                                    <?php 
                                                        if(isset($_SESSION['email_null']))
                                                        {
                                                            echo $_SESSION['email_null'];
                                                            echo "Email is not valid. <br>";
                                                        }
                                                            
                                                    ?>
                                                    <input type="email" name="uemail" id="" value='<?=$user_email?>'>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td>Preferred time for contact:</td>
                                            <td><input type="time" name="from" id=""></td>
                                            <td>to</td>
                                            <td><input type="time" name="upto" id=""></td>
                                            </tr>
                                            <tr>
                                                <td> Upload image 1*
                                                    <?php 
                                                        if(isset($_SESSION['image1_null']))
                                                            echo "You need to post at least one image. <br>";
                                                    ?>
                                                    <input type="file" name="image1" id="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Upload image 2<input type="file" name="image2" id=""></td>
                                            </tr>
                                            <tr>
                                                <td> Upload image 2<input type="file" name="image3" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>*Fileds are required</td>
                                                <td><input type="submit" value="Cancel" name="cancel"></td>
                                                <td colspan="2"><input type="submit" value="Submit" name="submit"></td>
                                            </tr>
                                        </table>
                                    </form>
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