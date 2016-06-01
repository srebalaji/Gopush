<?php
session_start();
$file=$_SESSION['u_ids'];
$www=$_SESSION['www'];

if(isset($_GET['tool']))
{
$url=$www.$file.'.txt';
  $file=$file.'.txt';
//echo '<script>alert("'.$file.'");</script>';
 
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       echo "<script>alert('Your website is validated'); </script>";
    echo'<script>window.location.href="send.php"</script>';
    }else{
      echo "<script>alert('Sorry! Your Website is not validated'); </script>";
    }
    curl_close($ch);
   

}
?>
<html>
 <style>
.rectangle {
   background: #eee;
   -moz-box-shadow: 3px;
   -webkit-box-shadow: none;
   -o-box-shadow: none;
   box-shadow: none;
   border-radius: 25px;
   margin-left: 5px !important;
   margin-top: 20px;
   border: 2px solid #eee ;
   height: 150px;
   width:100%;

 }
 </style>
 <body>
 <link rel="stylesheet" href="bootstrap.min.css">
 <nav class="navbar navbar-default">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> <img alt="G O P U S H" src="three115.png"></a>
    </div>
  
</nav>


<div class="jumbotron">
  <center><h2>Use This Code To Prompt Notification Approval</h2></center>
  </div>
  <div class="col-md-6 col-md-offset-3">
  <div class="navbar rectangle">
  <p style=" color:#04B404"><code> &lt;script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"&gt;&lt;/script&gt;</code></p>
  <p style=" color:#04B404"><code> &lt;link rel="stylesheet" href="jquery-impromptu.css"&gt;</code></p>
  <p style=" color:#04B404"><code> &lt;script src="jquery-impromptu.js"&gt;&lt;/script&gt; </code></p>
  <p style=" color:#04B404"><code> &lt;script src="testing.js"&gt;&lt;/script&gt; </code></p>
</div>

<p>To validate your website, create a text file with name "<? echo $file; ?>"</p>

  <br><p><a class="btn btn-primary btn-lg" href="validate.php?tool=yes" role="button">Authenticate the website</a></p>
</div>
</div>
</div>
</body>
</html>
<?php


?>