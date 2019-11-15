<?php
    session_start();
    require_once('../dbfiles/db.php');
?>

<html>
    <head>
        <title>Book details</title>
        <link rel="stylesheet" href="CSS/sliderview.css">
    </head>
    <body style=" background-color: blue;">
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
                                <?php 
                                    $id = $_REQUEST['id'];
                                    $sql = "select * from book_ad where id=$id";
                                    $result = get_result($sql);
                                    $row = mysqli_fetch_assoc($result); 
                                ?>
                                <td>
                                <h2><?=$row['bookname']?></h2>
                                    <h3><?=$row['writer']?></h3>
                                    <table border="1" width="100%">
                                        <tr>
                                            <td><h5>Edition: <?=$row['edition']?></h5></td>
                                            <td>For <?=$row['adtype']?></td>
                                            <td>
                                                Copy: <?=$row['copy']?> <br>
                                                Unit Price: <?=$row['unitprice']?> <br>
                                                Total Price: <?=$row['totalprice']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><?=$row['details']?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Address: <?=$row['house']?>, <?=$row['road']?>, post: <?=$row['postcode']?>,
                                                <?=$row['area']?>, <?=$row['subdistrict']?>, <?=$row['district']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone No: </td>
                                            <td colspan="2"><?=$row['phoneno']?></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td colspan="2"><?=$row['email']?></td>
                                        </tr>
                                        <tr>
                                            <td>Post date:</td>
                                            <td colspan="2"><?=$row['date']?></td>
                                        </tr>
                                    </table>
                                    <?php
                                        $sql5 = "select avg(rate) as avrate from rate_ad where ad_id=$id";
                                        $rateres = get_result($sql5);
                                        $rate = mysqli_fetch_assoc($rateres);
                                    ?>
                                    Rating: <?=$rate['avrate']?>/5
                                   
                                    <?php
                                        if(isset($_SESSION['wish_ad']))
                                        {
                                            echo "This ad is aleardy in your wishlist";
                                        }
                                        if(isset($_SESSION['voted']))
                                        {
                                            echo "You give rate to this ad once.";
                                        }
                                    ?>
                                    <form action="detailsAction.php?id=<?=$id?>" method="post">
                                    <input type="submit" value="Contact the seller" name="contact">
                                    <input type="submit" value="Add to wishlist" name="wish">
                                    <input type="submit" value="Report this ad" name="report">
                                    
                                    <br>
                                    Give a rating: 
                                    <div class="rate">
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                    </div>
                                    <br>
                                        <input type="submit" value="Rate" name="ratebtn">
                                    </form>
                                </td>
                                <td>
                                    <!-- Slideshow container -->
                                    <div class="slideshow-container">
                                    <?php
                                        $sql = "select * from ad_image where ad_id=$id";
                                        $result = get_result($sql);
                                        $row = mysqli_fetch_assoc($result); 
                                    ?>
                                    <!-- Full-width images with number and caption text -->
                                    <div class="mySlides fade">
                                    <div class="numbertext">1 / 3</div>
                                    <img src="<?=$row['image_path_1']?>" style="width:300px">
                                    </div>

                                    <div class="mySlides fade">
                                    <div class="numbertext">2 / 3</div>
                                    <img src="<?=$row['image_path_2']?>" style="width:300px">
                                    </div>

                                    <div class="mySlides fade">
                                    <div class="numbertext">3 / 3</div>
                                    <img src="<?=$row['image_path_3']?>" style="width:300px">
                                    </div>

                                    <!-- Next and previous buttons -->
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                    </div>
                                    <br>

                                    <!-- The dots/circles -->
                                    <div style="text-align:center">
                                    <span class="dot" onclick="currentSlide(1)"></span> 
                                    <span class="dot" onclick="currentSlide(2)"></span> 
                                    <span class="dot" onclick="currentSlide(3)"></span> 
                                    </div>
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
        <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1} 
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block"; 
        dots[slideIndex-1].className += " active";
        }
    </script>
    </body>
</html>