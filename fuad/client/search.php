<?php
    session_start();
    require_once('../dbfiles/db.php');
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }
    $val = $_REQUEST['key'];
	$sql = "select * from book_ad where bookname like '".$val."%'";
	$result = get_result($sql);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $row['bookname'];
	}
?>