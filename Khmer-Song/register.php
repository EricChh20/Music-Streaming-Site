

<html lang="en">
<head>

    <title>Document</title>
</head>

<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2> Login to your account </h2>
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
                <label for="newUsername">Username</label>
                <input id="newUsername" name="newUsername" type="text" placeholder="e.g. bartSimpson" required> 
            </p>
            <p>
                <label for="firstName">First Name</label>
                <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" required> 
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" required> 
            </p>
            <p>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="e.g. bartSimpson@gmail.com" required> 
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input id="email2" name="email2" type="text" placeholder="e.g. bartSimpson@gmail.com" required> 
            </p>
            <p>
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