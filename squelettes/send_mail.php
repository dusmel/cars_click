<?php
echo "sending...";
if (isset($_POST['send_message'])) {
  $name=htmlspecialchars($_POST['name']);
  $phone=htmlspecialchars($_POST['phone']);
  $message=htmlspecialchars($_POST['message']);
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception;


  //Load Composer's autoloader
  require '../PHPMailer/PHPMailerAutoload.php';
  //

  $mail = new PHPMailer;
                           // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'mail.click.rw';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'sender@click.rw';                 // SMTP username
      $mail->Password = 'getconnected';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('sender@click.rw');
      $mail->addAddress('developper@click.rw');     // Add a recipient
      $mail->addAddress('hadad@theclick.com');     // Add a recipient
                   // Name is optional


      // //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = ' from '.$name ;
      $mail->Body    = '<strong>Name: </strong>'.$name.'<br><br><strong>Phone Number:</strong><br>'.$phone.'<br><br><strong>Message</strong><br>'.$message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if ($mail->send()) {
        echo "<form id='form' method='post' action='../spip.php?page=sommaire'><input type='hidden' id='sent' name='sent' value='1'></form> ";
        ?>
        <script type="text/javascript">
            document.getElementById('form').submit();
        </script>
        <?php
    }
  } catch (Exception $e) {
    echo "<form method='post' id='form' action='../spip.php?page=sommaire'><input type='hidden' id='no-sent' name='no-sent' value='0'><input type='hidden' id='sent' name='msg' value='.$e.'></form> ";
      ?>
      <script type="text/javascript">
          document.getElementById('form').submit();
      </script>
      <?php
  }
}
if (isset($_POST['contact_us'])) {
  $name=htmlspecialchars($_POST['name']);
  $phone=htmlspecialchars($_POST['phone']);
  $email=htmlspecialchars($_POST['email']);
  $subject=htmlspecialchars($_POST['subject']);
  $message=htmlspecialchars($_POST['message']);
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception;


  //Load Composer's autoloader
  require '../PHPMailer/PHPMailerAutoload.php';
  //

  $mail = new PHPMailer;
                           // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'mail.click.rw';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'sender@click.rw';                 // SMTP username
      $mail->Password = 'getconnected';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('sender@click.rw');
      $mail->addAddress('developper@click.rw');     // Add a recipient
      $mail->addAddress('hadad@theclick.com');     // Add a recipient
                   // Name is optional


      // //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject ;
      $mail->Body    = '<strong>Name: </strong>'.$name.'<br><br><strong>Subject:</strong><br>'.$subject.'<br><br><strong>Phone Number:</strong><br>'.$phone.'<br><br><strong>Email:</strong><br>'.$email.'<br><br><strong>Message</strong><br>'.$message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if ($mail->send()) {
        echo "<form id='form' method='post' action='../spip.php?page=sommaire'><input type='hidden' id='sent' name='sent' value='1'></form> ";
        ?>
        <script type="text/javascript">
            document.getElementById('form').submit();
        </script>
        <?php
    }
  } catch (Exception $e) {
    echo "<form method='post' id='form' action='../spip.php?page=sommaire'><input type='hidden' id='no-sent' name='no-sent' value='0'><input type='hidden' id='sent' name='msg' value='.$e.'></form> ";
      ?>
      <script type="text/javascript">
          document.getElementById('form').submit();
      </script>
      <?php
  }
}


?>
