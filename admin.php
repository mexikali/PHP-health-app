<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Sayfası</title>
		<link rel="shortcut icon" type="image/png" href="admin.png" />
		<link rel="stylesheet" href="adminDesign.css" />
	</head>
	
	<body>
	
	<script src="admin_script.js"></script>
	
	<?php
		
		session_start();
		
		if($_SESSION['id'] == NULL || $_SESSION['admin'] != 1)
		{
			echo "<script>window.location.href = 'giris.php';</script>";
		}
		
		
		$username = $_GET[username];
		$password = $_GET[password];
		$tel = $_GET[tel];
		$email = $_GET[email];
		$hepsi = array($username,$tel,$email);
		
		
		if(($username != NULL) || ($tel != NULL) || ($email != NULL) || ($password == 0 && $password != NULL))
		{
			$hata = "";
			$hata1 = "\\nŞifre, noktalama işaretleri ve aşağıdaki karakterleri içermemeli:\\n\\n  ;  = > <";
			$hata2 = "Aşağıdaki bilgiler daha önce kullanılmış. Lütfen daha önce kullanılmamış bilgiler girin...\\n\\n";
			
			foreach($hepsi as $i)
			{
				if($i != NULL)
				{
					$hata = $hata.$i."\\n";
				}
			}
			
			if($hata != "")
			{
				$hata = $hata2.$hata;
			}
			
			if($password == -1)
			{
				$hata = $hata.$hata1;
			}
			
			echo "<script>alert('".$hata."')</script>";
		}
		
		
		
		if($_GET[basari] == 0 && $_GET[basari] != NULL)
		{
			echo "<script>alert('Kullanıcı sisteme eklenirken bir hata oluştu. Tekrar Deneyin...')</script>";
		}
		
		elseif($_GET[basari] == 1)
		{
			echo "<script>alert('Kullanıcı başarılı bir şekilde sisteme eklendi.')</script>";
		}
		
		
		if($_GET[silme] == 0 && $_GET[silme] != NULL)
		{
			echo "<script>alert('Kullanıcı silinirken bir hata oluştu. Tekrar Deneyin...')</script>";
		}
		
		elseif($_GET[silme] == 1)
		{
			echo "<script>alert('Kullanıcı başarılı bir şekilde silindi.')</script>";
		}
		
		
		
		
	?>
	
	<div id="main">
			<div id="btnDiv">
				<button class="btns b1" onclick="kullaniciyaGit()">Hesaplama Yap</button>
				<button class="btns b2" onclick="tumHesaplar()">Tüm Kullanıcılar</button>
				<button class="btns b3" onclick="yeniHesap()">Yeni Kullanıcı Ekle</button>
				<button class="btns b4" onclick="cikisYap()">Çıkış Yap</button>
			</div>
			
			
			<div id="actionDiv">
				
				<div id="tabloDiv" class="tabloDiv hidden">
					<table width='100%' border='1'>
					<tr>
						<td>ID</td>
						<td>İsim</td>
						<td>Soyisim</td>
						<td>Cinsiyet</td>
						<td>Kullanıcı Adı</td>
						<td>Email</td>
						<td>Telefon Numarası</td>
						<td>Admin</td>
						<td>İşlemler</td>
					</tr>
					
			<?php
			include("veritabanı.php");
			$newQuery = "SELECT * FROM kullanici";
			$queryK = $db->query($newQuery,PDO::FETCH_ASSOC);
		
			$row = $queryK->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
			
			
			while($i < count($row))
			{
				if($row[$i]['admin'] == 1)
				{
					$cevap = "Evet";
				}
				
				elseif($row[$i]['admin'] == 0)
				{
					$cevap = "Hayır";
				}
				
				echo "<tr>
						<td>".$row[$i]['id']."</td>
						<td>".$row[$i]['isim']."</td>
						<td>".$row[$i]['soyisim']."</td>
						<td>".$row[$i]['cinsiyet']."</td>
						<td>".$row[$i]['username']."</td>
						<td>".$row[$i]['email']."</td>
						<td>".$row[$i]['telNo']."</td>
						<td>".$cevap."</td>
						<td><a id='lg' href = 'ud.php?kId=".$row[$i]['id']."&op=0"."'>Güncelle</a>&nbsp;&nbsp;&nbsp;<a id='sg'href = 'ud.php?kId=".$row[$i]['id']."&op=1"."'>Sil</a></td>
					</tr>";
					
				$i++;
			}
			
			?>
					</table>
					
				</div>
				
				<div id="ekleDiv" class="ekleDiv hidden">
						
						<form action='kontrol2.php' method='post'>
							
							<label for='ad'>İsim:     </label>
							<input type='text' id='ad' name='ad' value='' required>
							<br><br>

							<label for='soyad'>Soyisim:  </label>
							<input type='text' id='soyad' name='soyad' value='' required>
							<br><br>
							
							<label for='cinsiyet'>Cinsiyet:</label>
							<select id='cinsiyet' name='cinsiyet'>
								<option value="kadın">Kadın</option>
								<option value="erkek">Erkek</option>
							</select>
							<br><br>
							
							<label for='username'>Kullanıcı Adı:  </label>
							<input type='text' id='username' name='username' value='' required>
							<br><br>
							
							<label for='password'>Şifre:  </label>
							<input type='password' id='password' name='password' value='' required>
							<br><br>
							
							<label for='email'>Email:  </label>
							<input type='email' id='email' name='email' value='' required>
							<br><br>
							
							<label for='telNo'>Tel No:  </label>
							<input type='text' id='telNo' name='telNo' value='' required>
							<br><br>
							
							<label for='admin'>Admin:</label>
							<select id='admin' name='admin'>
								<option value="0">Hayır</option>
								<option value="1">Evet</option>
							</select>
							<br><br>
							
							<input type='submit' value='Kaydet' id='save'/>
							
							
						</form>
						
				</div>
				
				<div id="gDiv" class="gDiv hidden">
						
						<form action='kontrol2.php' method='post'>
							
							<label for='ad'>İsim:     </label>
							<input type='text' id='ad1' name='ad' value=''>
							<br><br>

							<label for='soyad'>Soyisim:  </label>
							<input type='text' id='soyad1' name='soyad' value=''>
							<br><br>
							
							<label for='cinsiyet'>Cinsiyet:</label>
							<select id='cinsiyet1' name='cinsiyet'>
								<option value="">Seçin</option>
								<option value="kadın">Kadın</option>
								<option value="erkek">Erkek</option>
							</select>
							<br><br>
							
							<label for='username'>Kullanıcı Adı:  </label>
							<input type='text' id='username1' name='username' value=''>
							<br><br>
							
							<label for='password'>Şifre:  </label>
							<input type='password' id='password1' name='password' value=''>
							<br><br>
							
							<label for='email'>Email:  </label>
							<input type='email' id='email1' name='email' value=''>
							<br><br>
							
							<label for='telNo'>Tel No:  </label>
							<input type='text' id='telNo1' name='telNo' value=''>
							<br><br>
							
							<label for='admin'>Admin:</label>
							<select id='admin1' name='admin'>
								<option value="">Seçin</option>
								<option value="0">Hayır</option>
								<option value="1">Evet</option>
							</select>
							<br><br>
							
							<?php
								
								if($_GET[update] == 1 && $_GET[id] != NULL)
								{
									echo "<input type='text' id='gID' name='gID' value='".$_GET[id]."' hidden>";
								}
							?>


							
							<input type='submit' value='Güncelle' id='update'/>
							
							
						</form>
						
				</div>
				
			</div>
	</div>
	<?php
	
	if($_GET[update] == 1 && $_GET[id] != NULL)
		{
			echo "<script>document.querySelector('.ekleDiv').classList.add('hidden');</script>";
			echo "<script>document.querySelector('.tabloDiv').classList.add('hidden');</script>";
			echo "<script>document.querySelector('.gDiv').classList.remove('hidden');</script>";
			
		}
	?>
	
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	
	</body>
</html>
