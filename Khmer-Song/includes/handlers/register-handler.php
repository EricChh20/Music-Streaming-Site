<?php

function sanitizeFormUsername($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText; 
}

function sanitizeFormPassword($inputText){
    $inputText = strip_tags($inputText);
    return $inputText; 
}

function sanitizeFormString($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText; 
}

if(isset($_POST['loginButton'])){
    // log in button pressed
}




if(isset($_POST['registerButton'])){
    // register button pressed 
    $username = sanitizeFormUsername($_POST['newUsername']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);
    $newPassword = sanitizeFormPassword($_POST['loginPassword']);
    $newPassword2 = sanitizeFormPassword($_POST['loginPassword2']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $newPassword, $newPassword2); 

    if ($wasSuccessful == true){
        header("Location: index.php");
    }

}


?>