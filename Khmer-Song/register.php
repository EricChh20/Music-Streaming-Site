
<?php
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");
    $account = new Account();

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>

<html lang="en">
<head>

    <title>Document</title>
</head>

<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2> Check </h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required> 
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" required>
            </p>

            <button type="submit" name="loginButton">Log In</button>

        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Create your free account </h2>
            <p>
                <?php echo $account->getError(Constants::$usernameLength);?>  
                <label for="newUsername">Username</label>
                <input id="newUsername" name="newUsername" type="text" placeholder="e.g. bartSimpson"  value="<?php getInputValue('newUsername') ?>" required> 
            </p>
            <p>
                <?php echo $account->getError(Constants::$firstNameLength);?>
                <label for="firstName">First Name</label>
                <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstName') ?>" required> 
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastNameLength);?>
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('lastName') ?>" required> 
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch);?>
                <?php echo $account->getError(Constants::$emailsNotValid);?>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="e.g. bartSimpson@gmail.com" value="<?php getInputValue('email') ?>" required> 
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input id="email2" name="email2" type="text" placeholder="e.g. bartSimpson@gmail.com" value="<?php getInputValue('email2') ?>" required> 
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch);?>
                <?php echo $account->getError(Constants::$passwordsNotAlphaNum);?>
                <?php echo $account->getError(Constants::$passwordsLength);?>
                <label for="newPassword">Password</label>
                <input id="newPassword" name="loginPassword" type="password" required>
            </p>
            <p>
                <label for="newPassword2">Confirm Password</label>
                <input id="newPassword2" name="loginPassword2" type="password" required>
            </p>

            <button type="register" name="registerButton">Sign up</button>

        </form>
    
    </div>
</body>
</html>