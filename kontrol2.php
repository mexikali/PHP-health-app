<?php
// kullanıcı adı
// şifre
// email
// tell No

	include("veritabanı.php");

	$username = $_POST[username];
	$password = $_POST[password];
	$name = $_POST[ad];
	$surname = $_POST[soyad];
	$tel = $_POST[telNo];
	$admin = $_POST[admin];
	$email = $_POST[email];
	$cinsiyet = $_POST[cinsiyet];
	$id = $_POST[gID];
	
	
	
	// Kullanıcı Adı Kontrolü
	
	$sql = "SELECT * FROM kullanici WHERE username='".$username."'";
	$islem = "?";
	$problem = 0;
	
	$row = NULL;

	$queryK = $db->query($sql,PDO::FETCH_ASSOC);
	$row = $queryK->fetchAll(PDO::FETCH_ASSOC);
	
		if(count($row) == 1 && ($id == NULL || $id != $row[0]['id']))
		{
			$islem = $islem."username=".$username;
			$problem = 1;
		}
	
	
	// email Kontrolü
	
	$sql = "SELECT * FROM kullanici WHERE email='".$email."'";
	$row = NULL;

	$queryK = $db->query($sql,PDO::FETCH_ASSOC);
	$row = $queryK->fetchAll(PDO::FETCH_ASSOC);
	
		if(count($row) == 1 && $problem == 1 && ($id == NULL || $id != $row[0]['id']))
		{
			$islem = $islem."&email=".$email;
		}
		
		else if(count($row) == 1 && $problem == 0 && ($id == NULL || $id != $row[0]['id']))
		{
			$islem = $islem."email=".$email;
			$problem = 1;
		}
	
	
	// telNo Kontrolü
	$sql = "SELECT * FROM kullanici WHERE telNo='".$tel."'";
	$row = NULL;

	$queryK = $db->query($sql,PDO::FETCH_ASSOC);
	$row = $queryK->fetchAll(PDO::FETCH_ASSOC);
	
		if(count($row) == 1 && $problem == 1 && ($id == NULL || $id != $row[0]['id']))
		{
			$islem = $islem."&tel=".$tel;
		}
		
		else if(count($row) == 1 && $problem == 0 && ($id == NULL || $id != $row[0]['id']))
		{
			$islem = $islem."tel=".$tel;
			$problem = 1;
		}
	
	
	// Şifre Kontrolü
	
	$istenmeyen = array(" ","'",">","<",'"',"=",";");
	$sayi = 0;
	
		foreach($istenmeyen as $i)
		{
			if(strstr($password,$i))
			{
				$sayi++;
			}
		}
		
		if($sayi>0 && $problem == 1)
		{
			$islem = $islem."&password=-1";
		}
		
		elseif($sayi>0 && $problem == 0)
		{
			$islem = $islem."password=-1";
			$problem = 1;
		}
	
	
	if($problem == 1)
	{
		echo "<script>window.location.href = 'admin.php".$islem."';</script>";
	}
	
	else
	{
		if($id == NULL)
		{
			$sql = "INSERT INTO kullanici (id,username,password,email,telNo,isim,soyisim,cinsiyet,admin) VALUES(NULL,'".$username."','".md5($password)."','".$email."','".$tel."','".$name."','".$surname."','".$cinsiyet."','".$admin."')";
			
			$query = $db->prepare($sql);
			$result = $query->execute();
		}
		
		else
		{
			$all = array($username, $password, $name, $surname, $tel, $admin, $email, $cinsiyet);
			$all2 = array("username", "password", "isim", "soyisim", "telNo", "admin", "email", "cinsiyet");

			$sql = "UPDATE kullanici SET ";
			$sql2 = "WHERE kullanici.id = ".$id.";";

			for ($i = 0; $i < count($all); $i++) 
			{
				
				if ($sql !== "UPDATE kullanici SET " && $all[$i] != NULL) 
				{
					$sql = $sql.",";
				}

				if ($all[$i] != NULL && $all2[$i] == "password") 
				{
					$sql = $sql.$all2[$i]." = '".md5($all[$i])."' ";
				} 
				
				elseif ($all[$i] != NULL && $all2[$i] != "password") 
				{
					$sql = $sql.$all2[$i]." = '".$all[$i]."' ";
				}
			}
			
			$sql = $sql.$sql2;

			
			$query = $db->prepare($sql);
			$result = $query->execute();
		}
		
		
		
		if($result)
		{
			echo "<script>window.location.href = 'admin.php?basari=1';</script>";
		}
		
		else
		{
			echo "<script>window.location.href = 'admin.php?basari=0';</script>";
		}
	}
?>