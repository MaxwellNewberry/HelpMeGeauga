<?php 

    // Very basic security check to make sure we are submitting form and not just accessing the page.
    if(isset($_POST['name'])) {

        // Receive information
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = $_POST['subject'];

        // Set up backend of e-mail
        $content = "From: $name \nEmail: $email \nMessage: $message";
        $recipient = "youremail@here.com"; // ## CHANGE TO EMAIL TO SEND TO
        $mailheader = "From: $email \r\n";

        // Send the e-mail
        mail($recipient, $subject, $content, $mailheader) or die("Error!");
        print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));

        // Exit gracefully
        exit();
    }
    else {
        exit();
    }

?>