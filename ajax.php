<?php 
	
	
	$isim = $_POST['isim'];
	$soyisim = $_POST['soyisim'];
	$bel = $_POST['bel'];
	$boy = $_POST['boy'];
	$kilo = $_POST['kilo'];
	$yas = $_POST['yas'];
	$cinsiyet = $_POST['cinsiyet'];
	$yasam = $_POST['yasam'];
	
	$tümHesaplar = array();
	
	$ideal_height = ($boy - 100) - ($boy - 150) / 4;
	$difference = $kilo - $ideal_height;
	$bmi = $kilo / (($boy*$boy)/10000);
	
		if($cinsiyet == 0)
		{
			$vyo = (1.2 * $bmi) + (0.23 * $yas) - 5.4;
		}
		
		elseif($cinsiyet == 1)
		{
			$vyo = (1.2 * $bmi) + (0.23 * $yas) - 16.2;
		}
	
	$vym = ($kilo * $vyo) / 100;
	$yva = $kilo - $vym;
	$tka = ($kilo*15) / 100;
	$vko = 100 - $vyo;
	$vka = ($kilo*$vko) / 100;
	
			if ($bmi < 18.5)
            {
                $result = "Zayıf";
            }

            else if (bmi < 24.9)
            {
                $result = "Normal";
            }

            else if (bmi < 39.9)
            {
                $result = "Obez";
            }

            else
            {
                $result = "Morbid Obez";
            }
			
		
		$bmr = 88.362 + (13.397 * $kilo) + (4.799 * $boy) - (5.677 * $yas);

    
        if ($yasam == '0')
        {
            $su = ($bmr * 1.2); 
        }

        else if ($yasam == '1')
        {
            $su = ($bmr * 1.375);;  
        }

        else if ($yasam == '2')
        {
            $su = ($bmr * 1.55);;  
        }

        else if ($yasam == '3')
        {
            $su = ($bmr * 1.725);;  
        }

        else if ($yasam == '4')
        {
            $su = ($bmr * 1.9);;  
        }	
		
	
	array_push($tümHesaplar,$ideal_height,$difference,$vyo,$vym,$yva,$bmi,$tka,$vko,$vka,$result,$su);	
	
	
	for ($i=0; $i<count($tümHesaplar); $i++){
        echo $tümHesaplar[$i];
        echo '|';
    }
	
	
?>
