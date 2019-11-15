<?php
session_start();
//session_unset();
$email = $pass = null;
if(isset($_COOKIE['rem_em']) && isset($_COOKIE['rem_pass']))
{
    //echo "cookie found";
    header('location: indexController.php');
}
    
?>


<html>
    <head>
         <title>bookAbook</title>
         <link rel="stylesheet" type="text/css" href="index.css" media="all" />
    </head>
    
    <body>
        <form method="post" action="indexController.php">
            <table border="1" width="100%">
                <tr class="heading-section" height="60">
                    <td align="center" width="300"><b>bookAbook</b></td>
                    <td border="0" align="center">
                        <table>
                            <tr>
                                <td>
                                    Email <input type="text" name="lemail" value="<?php
                                    if(isset($_SESSION['index_login_email'])) 
                                        echo $_SESSION['index_login_email'];?>">
                                </td>
                                <td>
                                    Password <input type="password" name="lpass" value="">
                                </td>
                                <td>
                                    <input type="submit" name="login" value="Login">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php                                        
                                        if(isset($_SESSION['index_login_email_empty']))
                                            echo "Please enter your email";
                                        if(isset($_SESSION['index_login_email_not_valid']))
                                            echo "Please enter a valid email";
                                        if(isset($_SESSION['index_login_email_not_found']))
                                            echo "No accout found with this email";
                                        
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if(isset($_SESSION['index_login_pass_empty']))
                                            echo "Please enter your password";
                                        if(isset($_SESSION['index_login_pass_do_not_match']))
                                            echo "Wrong password";
                                    ?>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td align="right">
                                    <input type="checkbox" name="remember"> Remember Me
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table border="1">
                <tr>
                    <td class="description" width="50%" style="background:#4A876B" >
                        <h1><center>Description</center></h1>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, molestias. Veritatis magnam ex veniam repellat officia blanditiis perspiciatis minima explicabo quis, iusto modi eos, dolor atque illo architecto odio cupiditate?</p>
                    </td>
                    <td class="sign-up" style="background:#B2EFF6">
                    <td class="form1" style="background:#B2EFF6">
                        <h1><center>SIGN UP</center></h1>
                        <hr>
                        Name<br>
                        <input type="text" name="uname" value="<?php 
                        if(isset($_SESSION['index_reg_name']))
                            echo $_SESSION['index_reg_name'];
                        ?>"><br>
                        <?php
                            if(isset($_SESSION['index_reg_name_empty']))
                                echo "Please enter your name<br>";
                            if(isset($_SESSION['index_reg_name_first_char_not_valid']))
                                echo "The first character of a name should be a letter<br>";
                            if(isset($_SESSION['index_reg_name_chars_not_valid']))
                                echo "Name can only contains letters and space<br>";
                            if(isset($_SESSION['index_reg_name_words_not_valid']))
                                echo "Name should have at least two words<br>";
                        ?>
                        <br>
                        Email<br>
                        <input type="text" name="uemail" value="<?php
                        if(isset($_SESSION['index_reg_email']))
                            echo $_SESSION['index_reg_email'];    
                        ?>"><br>
                        <br>
                        <?php
                            if(isset($_SESSION['index_reg_email_empty']))
                                echo "Please enter your email.<br>";
                            if(isset($_SESSION['index_reg_email_not_valid']))
                                echo "Please enter a valid email.<br>";
                            if(isset($_SESSION['index_reg_email_exists_db']))
                                echo "An account already exists with this email.<br>";
                        ?>
                        <br>
                        Password<br>
                        <input type="password" name="pass" value=""><br>
                        <br>
                        <?php
                            if(isset($_SESSION['index_reg_pass_empty']))
                                echo "Please enter your password.<br>";
                        ?>
                        <br>
                        Confirm Password<br> 
                        <input type="password" name="conpass" value=""><br>
                        <br>
                        <?php
                            if(isset($_SESSION['index_reg_pass_do_not_match']))
                                echo "Passwords did not match<br>";
                        ?>
                        <br>
                        <input type="checkbox" name="terms"> Terms & Condition <br>
                        <?php
                            if(isset($_SESSION['index_reg_terms_not_check']))
                                echo "Please check the tearms and conditions.<br>";
                        ?>
                        <input style="cursor:pointer" type="submit" name="submit" value="Submit"><br>
                    </td>
                </tr>
            </table>
        </body>
    </form>
</html>