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
    $newPassword = sanitizeFormPassword($_POST['newPassword']);
    $newPassword2 = sanitizeFormPassword($_POST['newPassword2']);

}


?>