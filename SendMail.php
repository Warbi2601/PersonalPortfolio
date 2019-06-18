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
    
    function errorMessage($error) {
        $isError = true;

        if($error == 2)
        {
            $_SESSION["ContactForm"] = 2;
        }
        else if($error == 1)
        {
            $_SESSION["ContactForm"] = 1;
        }
    }    


      if(!preg_match($email_exp, $email)) {
          errorMessage(2);
      }

      if($_POST['name'] == "" || $_POST['email'] == "" || $_POST['phoneNumber'] == "" ||
      $_POST['message'] == "") {
          errorMessage(1);       
      }
      else
      {
          $isError = false;
      }

      if($isError == false)
      {
        $_SESSION["ContactForm"] = 0;
        mail($email_to, $email_Subject, $message);
      }

      header("Location: ContactMe.php");
?>