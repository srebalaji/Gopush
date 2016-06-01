<?php
if(!mysql_connect('localhost','root','') || !mysql_select_db('gopush'))
    {
    echo 'database error!!';
    die();

     }
     
if(isset($_POST['score']) && isset($_POST['url']))
{
$sc=$_POST['score'];
$website=$_POST['url'];

if($query=mysql_query("select website_id from users where website='$website'"))
{

if(mysql_num_rows($query)==1)
{
while($fetch=mysql_fetch_assoc($query))
{
$website_id=$fetch['website_id'];
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

if($query=mysql_query("insert into list values('','$sc','$website_id')"))
     {
     
echo 'You Will Be Notified When The Website Updates Its Feeds';     

     }
     else
     {
     echo die(mysql_error());
     echo 'Database error!!';
     }
}

?>