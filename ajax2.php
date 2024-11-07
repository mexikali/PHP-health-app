<?php

	session_start();
	
	$isim = $_POST['isim'];
	$soyisim = $_POST['soyisim'];
	$bel = $_POST['bel'];
	$boy = $_POST['boy'];
	$kilo = $_POST['kilo'];
	$yas = $_POST['yas'];
	$cinsiyet = $_POST['cinsiyet'];
	$yasam = $_POST['yasam'];
	
	$a0 = $_POST['a0'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$a4 = $_POST['a4'];
	$a5 = $_POST['a5'];
	$a6 = $_POST['a6'];
	$a7 = $_POST['a7'];
	$a8 = $_POST['a8'];
	$a9 = $_POST['a9'];
    $a10 = $_POST['a10'];
	$a11 = $_POST['a11'];
	$a12 = $_POST['a12'];
	
include("veritabanı.php");
	
	$sql = "INSERT INTO veri (id, kullanici_id, idealAğırlık, kiloFarkı, vucutYagOranı, vucutYagMiktarı, yagsızVucutOranı, bedenKitleIndex, toplamKemikAgırlık, vucutKasOranı, vucutKasAgırlık, vucutKanMiktarı, sonuc, günlükKaloriIhtiyacı, günlükSuIhtiyacı, isim, soyisim, cinsiyet, boy, kilo, bel, yas, yasam) VALUES (NULL, '".$_SESSION['id']."', '".$a0."', '".$a1."', '".$a2."', '".$a3."', '".$a4."', '".$a5."', '".$a6."', '".$a7."', '".$a8."', '".$a9."', '".$a10."', '".$a11."', '".$a12."', '".$isim."', '".$soyisim."', '".$cinsiyet."', '".$boy."', '".$kilo."', '".$bel."', '".$yas."', '".$yasam."');";
	
	$query = $db->prepare($sql);
	$result = $query->execute();
	
	date_default_timezone_set('Europe/Istanbul');
	$currentTimestamp = time();
	$formattedDateTime = date("Y-m-d H:i:s", $currentTimestamp);
	
	if($result) 
	{
    
		$insertedData = array(
			"id" => $db->lastInsertId(),
			"kullanici_id" => $_SESSION['id'],
			"idealAğırlık" => $a0,
			"kiloFarkı" => $a1,
			"vucutYagOranı" => $a2,
			"vucutYagMiktarı" => $a3,
			"yagsızVucutOranı" => $a4,
			"bedenKitleIndex" => $a5,
			"toplamKemikAgırlık" => $a6,
			"vucutKasOranı" => $a7,
			"vucutKasAgırlık" => $a8,
			"vucutKanMiktarı" => $a9,
			"sonuc" => $a10,
			"günlükKaloriIhtiyacı" => $a11,
			"günlükSuIhtiyacı" => $a12,
			"isim" => $isim,
			"soyisim" => $soyisim,
			"cinsiyet" => $cinsiyet,
			"boy" => $boy,
			"kilo" => $kilo,
			"bel" => $bel,
			"yas" => $yas,
			"yasam" => $yasam,
			"zaman" => $formattedDateTime
		);
		
		echo "1" . json_encode($insertedData);
	} 
	else 
	{
		echo "0";
	}
	

?>	