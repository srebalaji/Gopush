<?php

if(isset($_GET['score']))
{
if(!mysql_connect('localhost','root','') || !mysql_select_db('gopush'))
    {
    echo 'database error!!';
    die();

     }
     
if($query=mysql_query("insert into list values('','euyrrfnu','54fef011ee7a50.24680335')"))
     {
     
     

     }
     else
     {
     echo die(mysql_error());
     echo 'Database error!!';
     }

}

?>