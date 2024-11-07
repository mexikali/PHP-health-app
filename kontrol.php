<?php
	
	include("veritabanı.php");
	
	function temizle($metin)
	{
		$istenmeyen = array(" ","'",">","<",'"',"=",";");
		
		$metin = strip_tags($metin);
		
		forEach($istenmeyen as $i)
		{
			$metin = str_replace($i,"",$metin);
		}
		
		$veri = trim($metin);
	
	return $metin;
	}
	
	$oldUsername = $_POST[username];
	$oldPassword = $_POST[password];
	
	$username = temizle($_POST[username]);
	$password = temizle($_POST[password]);
	
	if($oldUsername != $username || $oldPassword != $password)
	{
		echo "<script>window.location.href = 'giris.php?sonuc=-1';</script>";
	}
	
	
	
	$sql = "SELECT * FROM kullanici WHERE username='".$username."' and password='".md5($password)."'";
	
	
	$row = NULL;

	$queryK = $db->query($sql,PDO::FETCH_ASSOC);
	$row = $queryK->fetchAll(PDO::FETCH_ASSOC);
	

	
	if(count($row) == 1)
	{	
		session_start();
			
		$_SESSION['id'] = $row[0]['id'];
		$_SESSION['isim'] = $row[0]['isim'];
		$_SESSION['soyisim'] = $row[0]['ünvan'];
		$_SESSION['username'] = $row[0]['username'];
		$_SESSION['admin'] = $row[0]['admin'];
		
		
			if($row[0]['admin'] == 1)
			{
				echo "<script>window.location.href = 'admin.php';</script>";
			}
			
			elseif($row[0]['admin'] == 0)
			{
				echo "<script>window.location.href = 'kullanici.php';</script>";
			}
	}
	
	else
	{
		/*
		echo "Bilgiler Yanlış...";
		echo "<br>";
		echo "<br>";
		echo "<a href = 'kayit.php'> Ana Sayfaya Dön </a>";*/
		
		echo "<script>window.location.href = 'giris.php?sonuc=-1';</script>";
	}
	
	

?>