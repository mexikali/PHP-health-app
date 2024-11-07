<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css" />
	<link rel="shortcut icon" type="image/png" href="icon.png" />
	
    
</head>
<body>
<?php
	
	echo "<script>function cikisYap(){window.location.href = 'giris.php?sonuc=1';}</script>";
	echo "<script>function admineDon(){window.location.href = 'admin.php';}</script>";
	
	session_start();
	
	if($_SESSION['id'] == NULL)
	{
		echo "<script>window.location.href = 'giris.php';</script>";
	}
	
	if($_SESSION['admin'] == 1)
	{
		echo "<button id='admineDon' onclick='admineDon()'>Admin Sayfasına Dön</button>";
	}
	
?>
	
	
	
	<button id="cikis" onclick="cikisYap()">Çıkış</button>
    
    <div id="main">
        <div id="form">
            <form id="formID">
                <label for="ad">İsim:     </label>
                <input type="text" id="ad" name="ad">
                <br>

                <label for="soyad">Soyisim:  </label>
                <input type="text" id="soyad" name="ad">
                <br>

                <label for="cinsiyet">Cinsiyet: </label>

                <select id="cinsiyet" name="cinsiyet">
                    <option value="0">Kadın</option>
                    <option value="1">Erkek</option>
                </select>
                <br>

                <label for="boy">Boy(cm):     </label>
                <input type="text" id="boy" name="boy">
                <br>

                <label for="weight">Ağırlık(kg):     </label>
                <input type="text" id="weight" name="weight">
                <br>

                <label for="perimeter">Bel Çevresi(cm):     </label>
                <input type="text" id="perimeter" name="perimeter">
                <br>

                <label for="age">Yaş:     </label>
                <input type="text" id="age" name="age">
                <br>

                <label for="lifeStyle">Yaşam Tarzı:</label>
                <select id="lifeStyle" name="lifeStyle">
                    <option value="0">Çok Monoton</option>
                    <option value="1">Az Hareketli</option>
                    <option value="2">Normal</option>
                    <option value="3">Hareketli</option>
                    <option value="4">Çok Hareketli</option>
                </select>


            </form>

            <button class="btn btn--clr">Sayfayı Temizle</button>
            <button class="btn btn--calculate">Hesapla</button>
			<button class="btn btn--kaydet">Kaydet</button>
            
        </div>
        <div id="results">
            <div class="row">
                  <div class="cell1">
                    <span id="q0">İdeal Ağırlık: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a0"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q1">Kilo Farkı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a1"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q2">Vücut Yağ Oranı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a2"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q3">Vücut Yağ Miktarı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a3"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q4">Yağsız Vücut Oranı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a4"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q5">Beden Kitle İndexi: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a5"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q6">Toplam Kemik Ağırlığı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a6"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q7">Vücut Kas Oranı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a7"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q8">Vücuttaki Kas Ağırlığı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a8"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q9">Vücuttaki Kan Miktarı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a9"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q10">Sonuç: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a10"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="11">Günlük Kalori İhtiyacı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a11"></span>
                  </div> 
            </div>

            <div class="row">
                <div class="cell1">
                    <span id="q12">Günlük Su İhtiyacı: </span>
                  </div> 

                  <div class="cell2">
                    <span id="a12"></span>
                  </div> 
            </div>

        </div>
    </div>
	
	<div>
		<br><br><br><br>
		<table width='100%' border='1'>
		
			<tr>
				<td>ID</td>
				<td>Kullanıcı ID</td>
				<td>İdeal Ağırlık</td>
				<td>Kilo Farkı</td>
				<td>Vücut Yağ Oranı</td>
				<td>Vücut Yağ Miktarı</td>
				<td>Yağsız Vücut Oranı</td>
				<td>Beden Kitle İndexi</td>
				<td>Toplam Kemik Ağırlığı</td>
				<td>Vücut Kas Oranı</td>
				<td>Vücut Kas Ağırlığı</td>
				<td>Vücut Kan Miktarı</td>
				<td>Sonuç</td>
				<td>Günlük Kalori İhtiyacı</td>
				<td>Günlük Su İhtiyacı</td>
				<td>İsim</td>
				<td>Soyisim</td>
				<td>Cinsiyet</td>
				<td>Boy</td>
				<td>Kilo</td>
				<td>Bel</td>
				<td>Yaş</td>
				<td>Yaşam Tarzı</td>
				<td>Hesaplama Zamanı</td>
			</tr>
			
		<?php	
			
			include("veritabanı.php");
			
			$newQuery = "SELECT * FROM veri where kullanici_id = '".$_SESSION['id']."'";
			$queryK = $db->query($newQuery,PDO::FETCH_ASSOC);
		
			$row = $queryK->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
			
			
			while($i < count($row))
			{
				echo "<tr> 
						<td>".$row[$i]['id']."</td>
						<td>".$row[$i]['kullanici_id']."</td>
						<td>".$row[$i]['idealAğırlık']."</td>
						<td>".$row[$i]['kiloFarkı']."</td>
						<td>".$row[$i]['vucutYagOranı']."</td>
						<td>".$row[$i]['vucutYagMiktarı']."</td>
						<td>".$row[$i]['yagsızVucutOranı']."</td>
						<td>".$row[$i]['bedenKitleIndex']."</td>
						<td>".$row[$i]['toplamKemikAgırlık']."</td>
						<td>".$row[$i]['vucutKasOranı']."</td>
						<td>".$row[$i]['vucutKasAgırlık']."</td>
						<td>".$row[$i]['vucutKanMiktarı']."</td>
						<td>".$row[$i]['sonuc']."</td>
						<td>".$row[$i]['günlükKaloriIhtiyacı']."</td>
						<td>".$row[$i]['günlükSuIhtiyacı']."</td>
						<td>".$row[$i]['isim']."</td>
						<td>".$row[$i]['soyisim']."</td>
						<td>".$row[$i]['cinsiyet']."</td>
						<td>".$row[$i]['boy']."</td>
						<td>".$row[$i]['kilo']."</td>
						<td>".$row[$i]['bel']."</td>
						<td>".$row[$i]['yas']."</td>
						<td>".$row[$i]['yasam']."</td>
						<td>".$row[$i]['zaman']."</td>
					</tr>";
					
				$i++;
			}
			
			?>	
		
		
		</table>
	</div>
    
    
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src = "script.js"></script>

</body>
</html>