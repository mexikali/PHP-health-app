<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<link rel="shortcut icon" type="image/png" href="login.png" />
		<link rel="stylesheet" href="girisDesign.css" />
	</head>
	
	<?php
		
		if($_GET[sonuc] == -1)
		{
			echo "<script>alert('Giriş Bilgileri Yanlış!!!');</script>";
		}
		
		else if($_GET[sonuc] == 1)
		{
			session_start();
			session_destroy();
		}
		
	?>
	<div id='form'>
            <form action='kontrol.php' method='post'>
                
				<label for='username'>Kullanıcı Adı:     </label>
                <input type='text' id='username' name='username' required>
                <br><br>

                <label for='password'>Şifre:  </label>
                <input type='password' id='password' name='password' required>
                <br><br>
		
				
				<input type='submit' value='Giriş Yap' id='gbtn'/>
                


            </form>
			
			
        </div>
		

	<body>
	</body>
</html>
