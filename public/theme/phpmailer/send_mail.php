<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'autoload.php';

if (isset($_POST)) {

   #Cleaning Html,Script Tags and special characters
   function postTextClean($text) {
      $text            = trim(addslashes(htmlspecialchars(strip_tags($_POST[$text]))));
      return $text;
   }

   function getTextClean($text) {
      $text            = trim(addslashes(htmlspecialchars(strip_tags($_GET[$text]))));
      $search          = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
      $replace         = array('c','c','g','g','i','i','o','o','s','s','u','u');
      $new_text        = str_replace($search,$replace,$text);
      return $new_text;
   }

   #Let's get the data from the form   
   $contact_name     = postTextClean('contact_name');
   $contact_email    = postTextClean('contact_email');
   $contact_subject  = postTextClean('contact_subject');
   $contact_message  = postTextClean('contact_message'); 
   $contact_phone    = postTextClean('contact_phone'); 
   $mail_content     = "<div>
                           <strong>From:</strong>
                           <span>{$contact_email}</span>
                        </div>
                        <div>
                           <strong>Name:</strong>
                           <span>{$contact_name}</span>
                        </div>
                        <div>
                           <strong>Subject:</strong>
                           <span>{$contact_subject}</span>
                        </div>
                        <div>
                           <strong>Phone:</strong>
                           <span>{$contact_phone}</span>
                        </div>
                        <div>
                           <strong>Message:</strong>
                           <p>".nl2br($contact_message)."</p>
                        </div>";

   // Hosting SMTP Settings
   $smtp_host        = 'smtp.examplehost.com';                     // Enter the smtp server address you got from your hosting here
   $smtp_port        = 587;                                        // TCP port to connect to
   $smtp_username    = 'yoursmtpusername@example.com';             // SMTP username
   $smtp_password    = 'yoursmtppassword';                         // SMTP password

   // Instantiation and passing `true` enables exceptions
   $mail = new PHPMailer(true);

   try {
      //Server settings
      $mail->isSMTP();                                                 
      $mail->SMTPAuth   = true;                        
      $mail->Host       = $smtp_host;                     
      $mail->Username   = $smtp_username;                   
      $mail->Password   = $smtp_password;               
      $mail->SMTPSecure = 'tls';
      $mail->Port       = $smtp_port;                                    
      $mail->CharSet    = "UTF-8";    
      $mail->SMTPAutoTLS = false;                            
      $mail->setFrom($smtp_username, $contact_subject);
      $mail->addAddress("yourmail@example.com");                  // Enter the email address you want to send here
      $mail->addReplyTo($contact_email, $contact_name);
      // Content
      $mail->isHTML(true);                                  
      $mail->Subject = $contact_subject;
      $mail->Body    = $mail_content;
      $mail->AltBody = strip_tags($mail_content);
      $mail->send();
      $message       = true;
      echo $message;   
   } catch (Exception $e) {
      $message       = false;
      echo $message;
      echo "Mailer Error: {$mail->ErrorInfo}";
      exit;
   }
}
?>