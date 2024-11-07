function cikisYap()
{
	window.location.href = 'giris.php?sonuc=1';
}

function kullaniciyaGit()
{
	window.location.href = 'kullanici.php';
}

function tumHesaplar()
{
	document.querySelector('.ekleDiv').classList.add('hidden');
	document.querySelector('.gDiv').classList.add('hidden');
	document.querySelector('.tabloDiv').classList.remove('hidden');
}

function yeniHesap()
{
	document.querySelector('.tabloDiv').classList.add('hidden');
	document.querySelector('.gDiv').classList.add('hidden');
	document.querySelector('.ekleDiv').classList.remove('hidden');
}