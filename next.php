
<?php
session_start();
$extn_id=0;
if(!mysql_connect('localhost','root','') || !mysql_select_db('gopush'))
    {
    echo 'database error!!';
    die();

     }

if(isset($_POST['title']) && isset($_POST['message']))
{
   $title=$_POST['title'];
   $message=$_POST['message'];
   }
   $qwe="APA91bGNnjJy3c3shqnt7UguOaJHFzAh5MJX0R7fZlIgFzCJF3R-D_KeIX7EPN9pUu3B-qZUGsoTyq7eF3h_PMkHPNvhmLf9YPC5L1y0KWHUy-lgX8G7rkD4dTOa_vOXTiTO8bEvYUsKKxZpHPbQJLWYGiZ8a_7XK1TZZYaVbgcMvxoCl2a9z7g";
$myfile = fopen("next2.json", "w") or die("Unable to open file!");
$txt = '{"title":"'.$title.'","message":"'.$message.'"}';
fwrite($myfile, $txt);

fclose($myfile);

echo 'message sent';
$website_id=$_SESSION['u_ids'];
//echo '<script>alert("'.$website_id.'");</script>';
if($query=mysql_query("select extn_id from list where website_id='$website_id'"))
{

if(mysql_num_rows($query)>=1)
{
while($fetch=mysql_fetch_assoc($query))
{
$extn_id=$fetch['extn_id'];
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
$url ="https://android.googleapis.com/gcm/send";
$access_token="AIzaSyA2k0acDElrbMPxy5olu0t5brsxn766eIY";
$data = json_encode(array(

        'registration_ids' => array($qwe)
        
        
        //'payload'=> $message
    ),true);

/*
$form_fields = {
  "registration_id": 'APA91bEmbHoTLcHjt_nCcvvvotHzmdfbzu1z9rK2k2SsB4jQbMKqBgU17FRQu37cPs_YE-kdjXeh0cMjB241MIYfmjDE1Zlr1SuIBeibtmUxuFS4IGLRVsBeedmEPlovINCt1SFkss1GIyBWc1v4v0RI_7pivW4QIfXkOwoBL8KNzGrzE4ysxxQ',
  "data.data": json.dumps({
    "title": self.request.get('title'),
    "message": self.request.get('message')
  })
}
*/
    $ch = curl_init();
    $curlConfig = array(
        CURLOPT_URL            => "https://android.googleapis.com/gcm/send",
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS     => $data,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER     => array(
            'Authorization: key= ' . $access_token,
            'Content-Type: application/json'
        )
    );
    curl_setopt_array($ch, $curlConfig);
    
    echo $result = curl_exec($ch);
?>