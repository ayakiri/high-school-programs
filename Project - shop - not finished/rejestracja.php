<?php
	session_start();

	if(isset($_POST['email'])){
		require_once "connect.php";

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

		$wszystko_OK=true;
		$nick = $_POST['nick'];
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
			
			if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
			{
				$wszystko_OK=false;
				$_SESSION['e_email']="Podaj poprawny adres e-mail!";
			}
	
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}

		$haslo = $haslo1;
	
		$rezultat = $polaczenie->query("SELECT id_klienci FROM klienci WHERE login='$nick'");
					
					if (!$rezultat) throw new Exception($polaczenie->error);
					
					$ile_takich_nickow = $rezultat->num_rows;
					if($ile_takich_nickow>0)
					{
						$wszystko_OK=false;
						$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
					}
	
		if ($wszystko_OK==true) {
			if ($polaczenie->query("INSERT INTO klienci VALUES (NULL, '$nick', '$haslo', '$email')")) {
				$_SESSION['udanarejestracja']=true;
				header('Location: logowanie.php');
			} else {
				throw new Exception($polaczenie->error);
			}
		}			
	
		$polaczenie->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>.: Rejestracja :. </title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body class="logowanie">
        <div class="content">
            <div class="login">
                <div class="logo">
                    <img src="logo.png">
                </div>
                <div>
                <form method="post" class="loginform">
                    
                    <label>Nickname:</label> <br /> 
                    <input type="text" value="<?php
                        if (isset($_SESSION['fr_nick']))
                        {
                            echo $_SESSION['fr_nick'];
                            unset($_SESSION['fr_nick']);
                        }
                    ?>" name="nick" /><br />
                    
                    <?php
                        if (isset($_SESSION['e_nick']))
                        {
                            echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                            unset($_SESSION['e_nick']);
                        }
                    ?>
                    
                    <label>E-mail:</label> <br /> <input type="text" value="<?php
                        if (isset($_SESSION['fr_email']))
                        {
                            echo $_SESSION['fr_email'];
                            unset($_SESSION['fr_email']);
                        }
                    ?>" name="email" /><br />
                    
                    <?php
                        if (isset($_SESSION['e_email']))
                        {
                            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                            unset($_SESSION['e_email']);
                        }
                    ?>
                    
                    <label>Password:</label> <br /> <input type="password"  value="<?php
                        if (isset($_SESSION['fr_haslo1']))
                        {
                            echo $_SESSION['fr_haslo1'];
                            unset($_SESSION['fr_haslo1']);
                        }
                    ?>" name="haslo1" /><br />
                    
                    <?php
                        if (isset($_SESSION['e_haslo']))
                        {
                            echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                            unset($_SESSION['e_haslo']);
                        }
                    ?>		
                    
                    <label>Repeat password:</label> <br /> <input type="password" value="<?php
                        if (isset($_SESSION['fr_haslo2']))
                        {
                            echo $_SESSION['fr_haslo2'];
                            unset($_SESSION['fr_haslo2']);
                        }
                    ?>" name="haslo2" /><br />
                    
                    
                    <div class="g-recaptcha" data-sitekey="PODAJ WŁASNY SITEKEY!"></div>
                    
                    <?php
                        if (isset($_SESSION['e_bot']))
                        {
                            echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                            unset($_SESSION['e_bot']);
                        }
                    ?>	
                    
                    <br />
                    
                    <input type="submit" value="Sign up" class="adds"/>
                    
				</form>
                </div>
            </div>
            <div class="info">
                <div class="pierre">
                    <img src="avatars/pierre.png">
                    <p>Already have account?
                        <a href="logowanie.php">LOGIN!</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>