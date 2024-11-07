<?php

	$op = $_GET[op];
	$id = $_GET[kId];
	include("veritabanı.php");
	
	if($op == 0 && $id > 0)//güncelleme
	{
		echo "<script>window.location.href = 'admin.php?update=1&id=".$id."';</script>";
	}
	
	elseif($op == 1 && $id > 0)//silme
	{
		$sql = "DELETE FROM kullanici WHERE id = ".$id;
		$query = $db->prepare($sql);
		$result = $query->execute();
		
		if($result)
		{
			echo "<script>window.location.href = 'admin.php?silme=1';</script>";
		}
		
		else
		{
			echo "<script>window.location.href = 'admin.php?silme=0';</script>";
		}
	}
	
	else
	{
		echo "<script>window.location.href = 'giris.php';</script>";
	}

?>