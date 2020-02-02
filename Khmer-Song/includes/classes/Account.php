<?php
    class Account { 
        
        private $con;
        private $errorArray; 

        public function __construct($con) {
            $this->con = $con; 
            # initializes an empty array 
            $this->errorArray = array(); 
        }
        public function login($un, $pw){
            $pw = md5($pw);
            $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

            if(mysqli_num_rows($query) == 1){
                return true;
            }
            else{
                array_push($this->errorArray, Constants::$loginFailed);
                return false; 
            }
        }
        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
            $this->validateUsername($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if (empty($this->errorArray)){
                #insert into DB if true 
                
                return $this->insertUserDetails($un, $fn, $ln, $em, $pw); 
            }
            else{
                return false; 
            }
        }
        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }
        private function insertUserDetails($un, $fn, $ln, $em, $pw){
            $encryptedPw = md5($pw); //password -> encrypted string 
            $profilePic = "assets/images/profile-pics/";
            $date = date("Y-m-d");
            # DB query to
            $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
            
            return $result; 
        }

        private function validateUsername($un){
            # pushes error message into array 
            if(strlen($un) > 25 || strlen($un) < 5){
                array_push($this->errorArray, Constants::$usernameLength);
                return; 
            }
            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
            if(mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
        }
        private function validateFirstName($fn){
            # error check 
            if(strlen($fn) > 25 || strlen($fn) < 2){
                array_push($this->errorArray, Constants::$firstNameLength);
                return; 
            }
        }
        private function validateLastName($ln){
            # error check 
            if(strlen($ln) > 25 || strlen($ln) < 2){
                array_push($this->errorArray, Constants::$lastNameLength);
                return; 
            }
        }
        private function validateEmails($em, $em2){
            if($em != $em2){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;             
            }
            # ensures email is valid format 
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailsNotValid);
                return; 
            }
            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }            
        }
        private function validatePasswords($pw, $pw2){
            if($pw != $pw2){
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }
            # if password contains elements not in the expression (not A-Z, a-z, or 0-9), then error 
            if(preg_match('/[^A-Za-z0-9]/', $pw)){
                array_push($this->errorArray, Constants::$passwordsNotAlphaNum);
                return;
            }
            if(strlen($pw) > 40 || strlen($pw2) < 8){
                array_push($this->errorArray, Constants::$passwordsLength);
                return; 
            }
        }
    }
?>