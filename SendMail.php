<?php
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $message = $_POST['message']."\n\n".$name."\n".$email."\n".$phoneNumber;
    $email_to = "contact@joshwarburton.co.uk";
    $email_Subject = "Message from ".$name." regarding portfolio website";
    $isError = true;
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    
    //NEED TO HANDLE JQUERY ERROR
    if(!preg_match($email_exp, $email)) {
        errorMessage(2);
    }

    //NEED TO HANDLE SUCCESS RESPONSE
    mail($email_to, $email_Subject, $message);
?>