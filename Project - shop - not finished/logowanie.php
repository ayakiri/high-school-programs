<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>.: Logowanie :. </title>
    </head>
    <body class="logowanie">
        <div class="content">
            <div class="login">
                <div class="logo">
                    <img src="logo.png">
                </div>
                <div class="loginform">
                    <form action="zaloguj.php" method="post">
                    
                        <label>Login:</label><br />
                        <input type="text" name="login" /> <br />
                        <label>Haslo:</label> <br />
                        <input type="password" name="haslo" /> <br />
                        <br />
                        <input type="submit" value="Zaloguj" class="adds"/>

                    </form>
                </div>
            </div>
            <div class="info">
                <div class="pierre">
                    <img src="avatars/pierre.png">
                    <p>You can make a new account for FREE!
                        <a href="rejestracja.php">DO IT!</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>