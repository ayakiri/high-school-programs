<?php
	session_start();
	
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	if ($polaczenie->connect_errno!=0) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$sql = "SELECT * FROM klienci WHERE login='$login' AND haslo='$haslo'";

		if($rezultat = @$polaczenie->query($sql)){
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0){
				$wiersz = $rezultat->fetch_assoc();

				$_SESSION['klient']['login'] = $wiersz['login'];
				$_SESSION['klient']['id'] = $wiersz['id_klienci'];
				echo "<script> alert(".$wiersz['id_klienci'].") </script>";

				$rezultat->free_result();
				header('Location: shop.php');
			} else {

			};
		}

		$polaczenie-> close();
	}
?>