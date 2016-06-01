<?php
session_start();

if(!mysql_connect('localhost','root','') || !mysql_select_db('gopush'))
    {
    echo 'database error!!';
    die();

     }

 if(isset($_POST['l_name']) && isset($_POST['l_pass']))
{
$name=$_POST['l_name'];
$pass=md5($_POST['l_pass']);

if($query=mysql_query("select username,password,website_id from users where username='$name' && password='$pass'"))
{

if(mysql_num_rows($query)==1)
{
while($fetch=mysql_fetch_assoc($query))
{
$website_id=$fetch['website_id'];
$_SESSION['u_ids']=$website_id;
header("Location:http://localhost/push/send.php");
}
}
else
{
echo 'error';
}
}

else
{
echo 'database errorsss';
}
}
?>