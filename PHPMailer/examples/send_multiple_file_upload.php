<?php
/**
 * PHPMailer multiple files upload and send example
 */
$msg = '';
if (array_key_exists('userfile', $_FILES)) {

    // Create a message
    // This should be somewhere in your include_path
    require '../PHPMailerAutoload.php';
    $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
    $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
    $mail->SMTPDebug = 0;


//Set the hostname of the mail server
    $mail->Host = 'defiro.websitewelcome.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "fabrice@theclick.rw";

//Password to use for SMTP authentication
    $mail->Password = "Tltcerpnjcs1";


    $mail->setFrom('fabrice@theclick.rw', 'First Last');
    $mail->addAddress('ntezi.fabrice@gmail.com', 'John Doe');
    $mail->Subject = 'PHPMailer file sender';
    $mail->Body = 'My message body';
    //Attach multiple files one by one
    for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
        $filename = $_FILES['userfile']['name'][$ct];
        if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
        } else {
            $msg .= 'Failed to move file to ' . $uploadfile;
        }
    }
    if (!$mail->send()) {
        $msg .= "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $msg .= "Message sent!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PHPMailer Upload</title>
</head>
<body>
<?php if (empty($msg)) { ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        Select one or more files:
        <input name="userfile[]" type="file" multiple="multiple">
        <input type="submit" value="Send Files">
    </form>
<?php } else {
    echo $msg;
} ?>
</body>
</html>
