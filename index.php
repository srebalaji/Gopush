<?php
session_start();

?>
 <html>
 <body>
 <link rel="stylesheet" href="bootstrap.min.css">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> <img alt="G O P U S H" src="three115.png"></a>
    </div>
  </div>
</nav>
<br>
<div class="container">
<div style="position:relative;left:0px;top:2px;">
<img src="three1151.png"> &nbsp <strong> GO PUSH </strong>
</div>


 <div class="col-md-6 col-md-offset-7">
 <div style="position:relative;left:200px;margin-top:0px;">
        <div class="content">
            <h2><strong>signup</strong></h2>
        <form class="form-income form-horizontal" role="form" action="index.php" method="post">

            <div class="input-group input-group-lg">
            
  
                &nbsp  <input type="text" class="form-control" placeholder="Username" id="" name="name"><br>
            </div>

            <div class="input-group input-group-lg">
            
                
              &nbsp  <input type="text" class="form-control" placeholder="Website name" id="" name="web"> <br>
            </div>

            <div class="input-group input-group-lg">
            &nbsp
                
                <input type="password" class="form-control" placeholder="Password" id="" name="pass"><br>
            </div>
&nbsp
           &nbsp <br> <button class="btn btn-lg btn-primary btn-lg" type="submit">Register</button></br>
        </form>

</div>
        </div>
		</div>

    <!-- login -->

    <div class="col-md-6 col-md-offset-7">
 <div style="position:relative;left:200px;margin-top:0px;">
        <div class="content">
            <h2><strong>signup</strong></h2>
        <form class="form-income form-horizontal" role="form" action="login.php" method="post">

            <div class="input-group input-group-lg">
            
  
                &nbsp  <input type="text" class="form-control" placeholder="Username" id="" name="l_name"><br>
            </div>

            <div class="input-group input-group-lg">
            &nbsp
                
                <input type="password" class="form-control" placeholder="Password" id="" name="l_pass"><br>
            </div>
&nbsp
           &nbsp <br> <button class="btn btn-lg btn-primary btn-lg" type="submit">Login</button></br>
        </form>

</div>
        </div>
    </div>
		
		</body>
		</html>

<?php

if(isset($_POST['name']) && isset($_POST['web']) && isset($_POST['pass'])   )
{

if(!empty($_POST['name']))
 {
if (preg_match("/^[a-zA-Z\s]*$/",$_POST['name']))
    {
$name=htmlentities($_POST['name']);
    }
else
    {
   
echo '<script>window.alert("name field should contain only letters and spaces");</script>';

die();
    }
}
 else
  {
   echo '<script>window.alert("name field should not be empty");</script>';
   die();
  }
  
 //website name validation
  
if(!empty($_POST['web']))
 {
if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['web']))
    {
$web=htmlentities($_POST['web']);
    }
else
    {
   
echo '<script>window.alert("website field should contain only letters and spaces");</script>';

die();
    }
}
 else
  {
   echo '<script>window.alert("website field should not be empty");</script>';
   die();
  }
  
  //passoword filed validation
  
if(!empty($_POST['pass']))
 {

$pass=htmlentities($_POST['pass']);
$pass=md5($pass);
    
}
 else
  {
   echo '<script>window.alert("password field should not be empty");</script>';
   die();
  }
  

} //big if

if(isset($name) && isset($web) && isset($pass))
{
 if(!mysql_connect('localhost','root','') || !mysql_select_db('gopush'))
    {
    echo 'database error!!';
    die();

     }
 $u_ids=uniqid('',true);
 $_SESSION['u_ids']=$u_ids;

$str=$web;
 $str=explode("/",$str);
$str=$str[0]."//".$str[2]."/".$str[3]."/";
//echo '<script>alert("'.$str.'");</script>';
 
 $_SESSION['www']=$str;
 //echo '<script>alert('.$u_ids.')</script>';
 if($query=mysql_query("insert into users values('','$name','$web','$u_ids','$pass')"))
     {
     echo '<script>window.alert("registered Successfully...!!");</script>';
     
echo'<script>window.location.href="validate.php"</script>';
     }
     else
     {
     echo die(mysql_error());
     echo 'Database error!!';
     }

}

?>