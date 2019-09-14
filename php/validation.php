<?php


   if(isset($_POST["btnSubmit"])){

    $firstName = trim($_POST['tbName']);
    $email = trim($_POST['tbMail']);
    $subject = trim($_POST['tbSubject']);
    $message = $_POST['tbMessage'];
    $errors = [];
    $info = [];
    $reName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";
    if(!preg_match($reName, $firstName)){
    array_push($errors, "First name is not ok");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Email is not ok");
    }
    $reSubject = "/^[A-Za-z0-9\s]{2,50}$/";
    if(!preg_match($reSubject, $subject)){
    array_push($errors, "Subject is not ok");
    }
    $reMessage = "/^[A-Za-z0-9\s\.,?!]{2,}$/";
    if(!preg_match($reMessage, $message)){
    array_push($errors, "Your message is not in a good format");
    }
    if(count($errors) > 0){
     echo "<h4> Errors: </h4>";
     echo "<ol class='bold'>";
     foreach ($errors as $error) {
     echo "<li> $error </li>";
     }
    echo "</ol>";
    }
    else {
    $to = "marijana.mitrovic242@gmail.com";
    $subject = "New Email Address for Website";
    $headers = "From: $email\n";
    $message = "A visitor to your site has sent the following email address.\n
    Email Address: $email";
    mail($to,$subject,$message,$headers);
    
    }
        }
        ?>
        