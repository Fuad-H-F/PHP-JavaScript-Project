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
        <title>Edit ad</title>
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
                                    <h2>Edit ad</h2>
                                    <?php
                                        $id = $_REQUEST['id'];
                                        $sql = "select * from book_ad where id=$id";
                                        $res = get_result($sql);
                                        $row = mysqli_fetch_assoc($res);
                                    ?>
                                    <form action="edithandle.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                                        <table>
                                            <tr>
                                                <td>Book Name:*</td>
                                                <td colspan="3">
                                                    <?php 
                                                        if(isset($_SESSION['bookname_null']))
                                                            echo "Plese enter a book name. <br>";
                                                    ?>
                                                    <input type="text" name="bookName" id="" value="<?=$row['bookname']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Writer Name:*</td>
                                                <td colspan="3"> 
                                                    <?php 
                                                        if(isset($_SESSION['writername_null']))
                                                            echo "Plese enter a writer name. <br>";
                                                    ?>
                                                    <input type="text" name="writerName" id="" value="<?=$row['writer']?>">
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
                                                    <input type="text" name="edition" id="" value="<?=$row['edition']?>">
                                                </td>
                                                <td></td>
                                                <td>Ad type:* 
                                                    <?php 
                                                        if(isset($_SESSION['adtype_not_selected']))
                                                            echo "Please select an option. <br>";
                                                    ?>
                                                    <select name="adType" id="">
                                                        <option value="Select" disabled>Select an option</option>
                                                        <option value="sell" <?php 
                                                            if($row['adtype'] == 'sell')
                                                                echo "selected";
                                                        ?>>Sell</option>
                                                        <option value="rent" <?php 
                                                            if($row['adtype'] == 'rent')
                                                                echo "selected";
                                                        ?>>Rent</option>
                                                        <option value="donate" <?php 
                                                            if($row['adtype'] == 'donate')
                                                                echo "selected";
                                                        ?>>Donate</option>
                                                    </select>
                                                    <br>Unit price: 
                                                    <?php 
                                                        if(isset($_SESSION['price_null']))
                                                            echo "Plese enter a price. <br>";
                                                    ?>
                                                    <input type="number" name="price" id="" value="<?=$row['unitprice']?>">
                                                    <br>Number of copy:* 
                                                    <?php 
                                                        if(isset($_SESSION['copy_null']))
                                                            echo "Plese enter copy value. <br>";
                                                    ?>
                                                    <input type="number" name="copy" id="" value="<?=$row['copy']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Details</td>
                                                <td colspan="3"> <textarea name="bookDetails" id="" cols="30" rows="10"><?=$row['details']?></textarea></td>
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
                                                            <td><input type="text" name='house' value='<?=$row['house']?>'/></td>
                                                            <td><input type="text" name='road' value='<?=$row['road']?>'/></td>
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
                                                            <input type="text" name="area" value='<?=$row['area']?>'/>
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
                                                                <input type="text" name='subdistrict' value='<?=$row['subdistrict']?>'/>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if(isset($_SESSION['postcode_null']))
                                                                        echo "Post code can not be empty. <br>";
                                                                ?>
                                                                <input type="text" name='postCode' value='<?=$row['postcode']?>'/>
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
                                                                <input type="text" name='district' value='<?=$row['district']?>'/>
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
                                                    <input type="number" name="phnNo" id="" value='<?=$row['phoneno']?>'> <br>
                                                    Email: 
                                                    <?php 
                                                        if(isset($_SESSION['email_null']))
                                                        {
                                                            echo $_SESSION['email_null'];
                                                            echo "Email is not valid. <br>";
                                                        }
                                                            
                                                    ?>
                                                    <input type="email" name="uemail" id="" value='<?=$row['email']?>'>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td>Preferred time for contact:</td>
                                            <td><input type="time" name="from" id="" value=''></td>
                                            <td>to</td>
                                            <td><input type="time" name="upto" id="" value=''></td>
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