<?php
     
    if(isset($_POST['sendMail']))
    {

        require 'mail/PHPMailerAutoload.php';

        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $msg=$_POST['msg'];

        //$file=$_FILES["file"];
        //$sendFile=$_FILES["sendFile"]["name"];
        //move_uploaded_file($_FILES["sendFile"]["tmp_name"],"files/".$_FILES["sendFile"]["name"]);

        //echo $msg;
   
        $mail = new PHPMailer;

            //$mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'saifulislamw60@gmail.com';                 // SMTP username
            $mail->Password = 'SAIFULislam$25';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('saifulislamw60@gmail.com', 'Test Mail');
            $mail->addAddress($email);     // Add a recipient
           
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            $mail->addAttachment($_FILES['sendFile']['tmp_name'], $_FILES['sendFile']['name']);         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $subject;
            $mail->Body    = $msg;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

        
    }
    
    
    
    ?>

<!DOCTYPE html>
<html>  
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mail Send</title> 

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>     
    </head>
    <body>
    <div class="container">
        <h1>Send Mail With Attachment</h1>
<form method="post" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="exampleInputEmail1">To Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
 
 <div class="form-group">
    <label for="exampleTextarea">Subject</label>
    <input type="text" name="subject" class="form-control" placeholder="Enter E-Mail subject" > 
  </div>
 
  
  <div class="form-group">
    <label for="exampleTextarea">Message</label>
    <textarea class="form-control" name="msg" id="exampleTextarea" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File To Send</label>
    <input type="file" name="sendFile" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    
  </div>
  
 
  <button type="submit" name="sendMail" class="btn btn-primary">Submit</button>
</form>
        
  </div>       
              
        
    </body>
</html>