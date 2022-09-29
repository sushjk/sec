<?php
$connection = mysqli_connect("localhost","root","","sec");

$get_users = "SELECT * FROM entries where is_verified = 1 and subscription = 1";

$user_result = mysqli_query($connection,$get_users);

if (mysqli_num_rows($user_result) > 0) {
  
  while($row = mysqli_fetch_assoc($user_result)) {

//$row['email'];

$url = "https://c.xkcd.com/random/comic/";
$ch  = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$a = curl_exec($ch);
$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$str  = file_get_contents($url.'info.0.json');


$json = json_decode($str, true);
// Get file info.
$imageTitle = $json['title'];

// Image url.
$imageUrl = $json['img'];

// Image alt text.
$imageAlt = $json['alt'];

// Image file.
$imageFile = file_get_contents($imageUrl);

$tokens = explode('/', $imageUrl);

// File name.
$fileName = $tokens[(count($tokens) - 1)];

// File extension.
$ext = explode(".", $fileName);

// File type.
$fileType = $ext[1];

// File size.
$header = get_headers($imageUrl, true);

$fileSize = $header['Content-Length'];

$to      = $row['email'];//'sushjk6@gmail.com';

$subject = "Enjoy reading today's most interesting XKCD comics";
$message = '
<html>
<head>
<title>Your email '.$to.' is listed in our XKCD comics subscribers.</title>
</head>
<body> 
    <h1>'.$imageTitle.'</h1>
   <p>We hope you enjoy emails from SITS. If you wish to unsubscribe.<p>
   <p></p>
<br/></br><a href="http://localhost/xkcd/unsubscribe.php?email='.$row['email'].'" target="_blank" class=" block-center" style="background:orange;color:#fff;padding:15px;border-radius:5%;text-decoration:none;font-weight:600;width:200px"> 
                        Unsubscribe
                    </a>.
</body>
</html>';


// File.
$content = chunk_split(base64_encode($imageFile));

// A random hash will be necessary to send mixed content.
$semiRand     = md5(time());
$mimeBoundary = '==Multipart_Boundary_x{$semiRand}x';

$eol = "\r\n";

$headers = 'Organization: Hostinger'.$eol;
$headers  = 'MIME-Version: 1.0'.$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"{$mimeBoundary}\"".$eol;
$headers .= 'Content-Transfer-Encoding: 7bit'.$eol;
$headers .= 'X-Priority: 3'.$eol;
$headers .= 'X-Mailer: PHP'.phpversion().$eol;

// Message.
$body  = '--'.$mimeBoundary.$eol;
$body .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
$body .= 'Content-Transfer-Encoding: 7bit'.$eol;
$body .= $message.$eol;

// Attachment.
$body .= '--'.$mimeBoundary.$eol;
$body .= "Content-Type:{$fileType}; name=\"{$fileName}\"".$eol;
$body .= 'Content-Transfer-Encoding: base64'.$eol;
$body .= "Content-disposition: attachment; filename=\"{$fileName}\"".$eol;
$body .= 'X-Attachment-Id: '.rand(1000, 99999).$eol;
$body .= $content.$eol;
$body .= '--'.$mimeBoundary.'--';

$success = mail($to, $subject, $body, $headers);

if ($success === false) {
    echo '<h3>Failure</h3>';
    echo '<p>Failed to send email to '.$to.'</p>';
} else {
    echo '<p>Your email has been sent to '.$to.' successfully.</p>';
}

  }//while loop close

}














?>