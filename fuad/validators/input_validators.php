<?php
//require_once('../dbfiles/db.php');

// call this method to check if the first charecter is valid or not?
function first_char_name_valid($name)
{
    $namearr = str_split($name);
    if(($namearr[0] >= 'a' && $namearr[0] <= 'z') || ($namearr[0] >= 'A' && $namearr[0] <= 'Z'))
    {
        return true;
    }
    return false;
}

// call this method to check if the charecters is valid or not?
function chars_name_valid($name)
{
    $namearr = str_split($name);
    $arrlen = count($namearr);
    $flag = true;
    for($i=0; $i<$arrlen; $i++)
    {
        if(!($namearr[$i] >= 'a' && $namearr[$i] <= 'z') && !($namearr[$i] >= 'A' && $namearr[$i] <= 'Z') && !($namearr[$i] == ' ' ))
        {
            $flag = false;
            break;
        }
    }
    return $flag;
}

// call this method to check if a string contains two or more words or not?
function two_words_valid($value)
{
    $words = explode(' ',$value);
    if(count($words) < 2)
    {
        return false;
    }
    return true;
}

//call this method to check if a string contains only numbers like phn no
function numberchk($value)
{
    $arr = str_split($value);
    $len = count($arr);
    for($i = 0; $i<$len; $i++)
    {
        if(!($arr[$i]>= 0 && $arr[$i]<= 9))
        {
            return false;
        }
    }
    return true;

}

// call this method to check if a email address is valid or not?
function email_valid($email)
{
    $emailarr = explode('@',$email);
    if(count($emailarr)==2)
    {
        $emailexarr = explode('.',$emailarr[1]);
        if(count($emailexarr)!=2)
        {
            return false;
        }
    }
    else
    {
        return false;
    }
    return true;
}

// call this method to check if email already in the database
function email_db_chk($email)
{
    $sql = "select email from user_login where email = '$email'";
    while($row = mysqli_fetch_assoc(get_result($sql)))
    {
        return false;
    }
    return true;
}

// call this method to get the diffrence between two dates
function datechk($date1, $date2)
{
    $dec = strtotime($date1) - strtotime($date2);
    $diff = abs($dec);
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    if($dec < 0)
        $dec = '-';
    else 
        $dec = '+';
    $diffarr = array('year'=>$years, 'month'=>$months, 'day'=>$days, 'flag'=>$dec);
    //printf("%d years, %d months, %d days\n", $years, $months, $days);
    return $diffarr;
}

?>